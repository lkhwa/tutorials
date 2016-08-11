const fs = require('fs');
const path = require('path');
const handlebars = require('handlebars');
const htmlparser = require('htmlparser2');
const showdown = require('showdown');
const through = require('through2');
const del = require('del');
const gulp = require('gulp');
const $ = require('gulp-load-plugins')();

const DIST_DIR = './dist';

//adds class="table" to tables so that Bootstrap
//will format them nicely
var showdownTableExtension = function() {
    return [{
        type: 'output',
        regex: '<table>',
        replace: '<table class="table">'
    }];
};

var mdConverter = new showdown.Converter({
    omitExtraWLInCodeBlocks: true,
    prefixHeaderId: "sec-",
    parseImgDimensions: true,
    simplifiedAutoLink: true,
    strikethrough: true,
    tables: true,
    extensions: [showdownTableExtension]
});
var htmlminOpts = {
    collapseWhitespace: true,
    conservativeCollapse: true    
};

//template for all tutorials
var template = handlebars.compile(fs.readFileSync('./src/template.html', {encoding: 'utf8'}));

//mergeHTML merges tutorial file with the template. 
//Title and subtitle come from meta.json in the same dir as the template
function mergeHTML(file, enc, cb) {
    var meta;
    try {
        meta = require(path.join(path.dirname(file.path), 'meta.json'));
    } catch(err) {
        throw new $.util.PluginError('MergeHTML', 'Missing or invalid meta.json for file ' 
            + file.path + ': ' + err);
    }

    var merged = template({
        meta: meta,
        content: file.contents.toString('utf8')
    });
    file.contents = Buffer.from(merged, 'utf8');
    cb(null, file);
}

//convertMarkdown converts a markdown tutorial to HTML
function convertMarkdown(file, enc, cb) {
    var html = mdConverter.makeHtml(file.contents.toString('utf8'));
    file.contents = Buffer.from(html, 'utf8');
    cb(null, file);
}

//mergeIndex merges the root index.html to produce
//a table of contents page
function mergeIndex(file, enc, cb) {
    var indexTemplate = handlebars.compile(file.contents.toString(enc));
    var merged = indexTemplate({contents: gatherContents()});
    file.contents = Buffer.from(merged, 'utf8');
    cb(null, file)
}

//gatherContents loads ./src/contents.json to get the
//ordered list of tutorials for the contents page
function gatherContents() {
    var contents = require('./src/contents.json');
    return contents.map(dir => {
        try {
            var meta = require('./src/' + path.join(dir, 'meta.json'));
            meta.url = dir;
            return meta;
        } catch(err) {
            throw new $.util.PluginError('Gather Contents', 
                'Missing or invalid meta.json for file ' 
                + ': ' + err);
        }
    });
}

gulp.task('merge-md', () => {
    return gulp.src('./src/*/*.md')
        .pipe(through.obj(convertMarkdown))
        .pipe(through.obj(mergeHTML))
        .pipe($.rename({extname: '.html'}))
        .pipe(gulp.dest(DIST_DIR))
});

gulp.task('merge-html', () => {
    return gulp.src('./src/*/*.html')
        .pipe(through.obj(mergeHTML))
        .pipe($.htmlmin(htmlminOpts))
        .pipe(gulp.dest(DIST_DIR));
});

gulp.task('images', () => {
    return gulp.src('./src/*/img/*')
        .pipe($.cache($.imagemin()))
        .pipe(gulp.dest(DIST_DIR));
});

gulp.task('custom-css', () => {
    return gulp.src('./src/*/css/*')
        .pipe($.autoprefixer('last 2 version'))
        .pipe($.cssnano())
        .pipe(gulp.dest(DIST_DIR));
});

gulp.task('global-css', () => {
    return gulp.src('./src/css/**')
        .pipe($.autoprefixer('last 2 version'))
        .pipe($.cssnano())
        .pipe(gulp.dest(DIST_DIR + '/css'));
});

gulp.task('global-img', () => {
    return gulp.src('./src/img/**')
        .pipe($.cache($.imagemin()))
        .pipe(gulp.dest(DIST_DIR + '/img'));
});

gulp.task('global-lib', () => {
    return gulp.src('./src/lib/**')
        .pipe(gulp.dest(DIST_DIR + '/lib'));
});

gulp.task('index', () => {
    return gulp.src('./src/index.html')
        .pipe(through.obj(mergeIndex))
        .pipe($.htmlmin(htmlminOpts))
        .pipe(gulp.dest(DIST_DIR));
});

gulp.task('clean', () => {
    return del(DIST_DIR);
});

gulp.task('default', [
    'merge-html', 
    'merge-md', 
    'images',
    'custom-css',
    'global-css', 
    'global-img', 
    'global-lib', 
    'index'
]);
