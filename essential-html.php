<?php 
$title = 'Essential HTML';
$subtitle = 'What you need to know to get started';
include 'header.php';
?>

<p><abbr title="HyperText Markup Language">HTML</abbr> is an acronym that stands for HyperText Markup Language. This is the primary language we use to write web pages. It's called a &quot;markup&quot; language because it marks-up otherwise plain text with additional information about the document's structure (headings, paragraphs, headers, footers, asides, etc.). And the &quot;HyperText&quot; part just means that it's a markup language for documents that link to each other.</p>

<p>HTML's syntax is very simple. One of the reasons it has become so popular is that it generally takes someone only a few minutes to learn it. If you already know HTML, you can skim this as a refresher. If you've never written HTML from scratch, this tutorial will teach you how to do it.</p>

<h2>HTML is Just Text</h2>

<p>HTML files are just plain text files, so you can edit them in any text editor, but there are several editors that are optimized for web development: see the <a href="resources.php">Helpful Resources page</a> for a list of the most common ones.</p>

<p>To start this tutorial, open your text editor, create a new file, and save it to disk with the name <code>test.html</code>. By saving it with that <code>.html</code> extension, your editor should automatically know that this file is an HTML file.</p>

<h2>HTML Documents Start with a Doctype Declaration</h2>

<p>All HTML files start with a document type declaration, commonly referred to as the &quot;doctype.&quot; The HTML version 5 document type declaration is really simple. Enter this as the first line of your HTML file:</p>

<pre><code class="language-html">&lt;!doctype html&gt;</code></pre>

<p>That tells any program that reads this file to interpret the contents as HTML version 5 syntax. As the version number implies, <a href="http://diveintohtml5.info/past.html">there have been several versions of HTML</a> already, and not all of them used the exact same syntax. Thankfully for you, HTML5 is now the current standard and it's syntax is simple and straightforward.</p>

<h2>HTML is a Tree of Elements</h2>

<p>The rest of an HTML document is a simple tree of <strong>elements</strong>. If you've taken a second-level computer science course, you should already know what a tree data structure is, but if you haven't (or if you forgot), a tree is a very common data structure that looks like this:</p>

<p><img src="img/tree.png" alt="tree data structure" /></p>

<p>Each of those blue rectangles is known as a <strong>node</strong>. Each node has a <strong>parent node</strong>, except for the one at the top of the tree, which is known as the <strong>root node</strong>. Each node may have one or more <strong>child nodes</strong>, and those children can have children of their own (and so on, and so on). A node with no children is known as a <strong>leaf node</strong>.</p>

<p>The nodes in an HTML tree are known as <strong>elements</strong>, and they look like this:</p>

<pre><code class="language-html">&lt;html&gt;...some content...&lt;/html&gt;</code></pre>

<p>An element has a <strong>start tag</strong>, an <strong>end tag</strong>, and typically some <strong>content</strong> in between. The start tag is this bit:</p>

<pre><code class="language-html">&lt;html&gt;</code></pre>

<p>A start tag begins with the less-than symbol and ends with the greater-than symbol. In between is the name of the element, in this case <code>html</code>. The HTML standard defines <a href="http://www.w3schools.com/tags/ref_byfunc.asp">lots of different elements</a> and each tells the program reading the file something about the content within the element. For example, the <code>&lt;p&gt;</code> element tells the reader program that the content inside is a normal paragraph, whereas the <code>&lt;h1&gt;</code> element tells the reader that the content inside is a top-level heading.</p>

<p>The end tag is just like the start tag except that it has a forward slash added just after the less-than sign, like this:</p>

<pre><code class="language-html">&lt;/html&gt;</code></pre>

<p>What goes in between the start and end tags is the element's content, which can be plain text and/or other child elements (hence the tree structure). For example, a typical paragraph might have some text and some other elements that also contain their own text:</p>

<pre><code class="language-html">&lt;p&gt;I want to really &lt;em&gt;emphasize&lt;/em&gt; that last point!&lt;/p&gt;</code></pre>

<blockquote>
<p>I really want to <em>emphasize</em> that point</p>
</blockquote>

<p>The <code>&lt;em&gt;</code> element is used for content that is emphasized, and it can be nested inside lots of other elements. Although browsers typically render emphasized text in italics, you shouldn't think of that element as &quot;the italics tag.&quot; Instead, think of it as a tag that tells the program reading this page that the text inside is emphasized. We can use CSS to format that emphasized text any way we want, so we use the <code>&lt;em&gt;</code> element to denote the <em>function</em> that text plays; we use it to add <em>meaning</em> to otherwise plain text.</p>

<h2>Attributes</h2>

<p>The start tag of an element may also contain one or more <strong>attributes</strong>, which are used to specify options, provide additional information, or add subtler shades of meaning to an element. Attributes go inside the start tag, and look like this:</p>

<pre><code class="language-html">&lt;html lang="en"&gt;...some content...&lt;/html&gt;</code></pre>

<p>The syntax for attributes is a name, followed by an equal sign, followed by a value in double-quotes. The HTML standard defines several <a href="http://www.w3schools.com/tags/ref_standardattributes.asp">global attributes</a> that can be used on any element, and many elements also define their own attributes that are particular to that element. The <code>lang</code> attribute used in the previous example is a global one used to indicate the language in which the element's content is written. Programs reading this file might use that to properly index the content, correctly pronounce it via a screen reader, or even translate it into another language.</p>

<h2>Self-Closing Elements</h2>

<p>A few HTML elements don't require a separate end-tag because they can't contain any child elements or other textural content. A great example is the <code>&lt;img&gt;</code> element, which is used for inserting images into the page. You can specify the path to the image file in an attribute named <code>src</code>, but the image element itself can't contain additional text or other content. In these cases, all you need to include is the start tag:</p>

<pre><code class="language-html">&lt;img src="path/to/image/file.png" alt="description of image for screen readers and indexers"&gt;</code></pre>

<p>These are known as <strong>self-closing elements</strong>. You may also see these kinds of elements with a forward slash included before the ending greater-than sign. This was required by previous versions of HTML (especially the abomination known as <a href="http://www.w3schools.com/html/html_xhtml.asp">XHMLT</a>), but in HTML5 it's totally optional. Some purists will still insist that you include it, and if you do, it looks like this:</p>

<pre><code class="language-html">&lt;img src="path/to/image/file.png" alt="description of image for screen readers and indexers"/&gt;</code></pre>

<p>But again, this is no longer required in HTML5, so feel free to omit that forward slash.</p>

<h2>Overall Page Structure</h2>

<p>Now that you understand the basic syntax for elements and attributes, let's see how they combine to create a basic page. As we noted earlier, every page begins with the HTML5 doctype declaration, and the rest is a tree of elements containing content. The root element is named <code>&lt;html&gt;</code>, and it should contain two other elements named <code>&lt;head&gt;</code> and <code>&lt;body&gt;</code>. Add this to your file:</p>

<pre><code class="language-html">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
    &lt;head&gt;
        ...page head content...
    &lt;/head&gt;
    &lt;body&gt;
        ...page body content...
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<h2>The Head Section</h2>

<p>The <code>&lt;head&gt;</code> element contains information about the page that doesn't appear in the main content window when viewing the page in the browser. For example, we can specify the title of the page here:</p>

<pre><code class="language-html">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;title&gt;My Page Title&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        ...page body content...
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Most browsers will show the page title in the tab at the top of the browser window, and use that as the default bookmark name if you bookmark the page. But search indexers and screen readers for the blind also use this to get the page title, which is often a strong signal about what the page body is about.</p>

<p>Another element you commonly see the in the <code>&lt;head&gt;</code> section is <code>&lt;meta&gt;</code>, which can be used to specify lots of different meta-data about the page. One very important bit of meta-data is the character set used when saving this file. The character set tells the browser how to translate the bits it receives from the server (or the local disk) into letters. Nearly all editors these days will save files in the UTF-8 character set, as it allows the mixing of different scripts (Latin, Cyrillic, Chinese, Kanji, etc) in the same file, while still optimizing the file's size. To tell the browser that this file was saved in UTF-8, add the following <code>&lt;meta&gt;</code> element to the <code>&lt;head&gt;</code> section:</p>

<pre><code class="language-html">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;My Page Title&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        ...page body content...
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>You can also use the <code>&lt;meta&gt;</code> element to specify author, description, and keyword information about your document:</p>

<pre><code class="language-html">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="author" content="your name"&gt;
        &lt;meta name="description" content="description of your page"&gt;
        &lt;meta name="keywords" content="list,of,keywords,separate,by,commas"&gt;
        &lt;title&gt;My Page Title&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        ...page body content...
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Again, these are not visible in the browser window, but programs like search indexers refer to these elements to gather meta-data about your page.</p>

<p>Another important <code>&lt;meta&gt;</code> element to define is the one that controls how a browser on a mobile device handles zooming of the page. By default, a mobile browser will attempt to zoom out to show the entire page when it first loads. This is necessary if the page doesn't adjust its layout for smaller screens, but <a href="http://www.w3schools.com/css/css_rwd_viewport.asp">if your page is responsive to the screen width</a> (which ours will be), you can tell the browser not to zoom out using the <code>&lt;meta name="viewport"&gt;</code> element:</p>

<pre><code class="language-html">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="author" content="your name"&gt;
        &lt;meta name="description" content="description of your page"&gt;
        &lt;meta name="keywords" content="list,of,keywords,separate,by,commas"&gt;
        &lt;meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"&gt;
        &lt;title&gt;My Page Title&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        ...page body content...
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<h2>The Body Section</h2>

<p>The <code>&lt;body&gt;</code> element contains all the content that is visible on the page. There are <a href="http://www.w3schools.com/tags/ref_byfunc.asp">many elements</a> you can use in this section to convey your page content. We will discuss most of these in class as we go along, but for now, let's just add a simple heading and a paragraph.</p>

<pre><code class="language-html">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="author" content="your name"&gt;
        &lt;meta name="description" content="description of your page"&gt;
        &lt;meta name="keywords" content="list,of,keywords,separate,by,commas"&gt;
        &lt;meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"&gt;
        &lt;title&gt;My Page Title&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;My Page&lt;/h1&gt;
        &lt;p&gt;A simple paragraph in my page&lt;/p&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>You can now open this page in your web browser, and you should see the heading and the paragraph displayed in the browser window. The page title should also be shown in the browser tab. If you're using Sublime Text as your editor, right-click (or control + click on a single-button Mac) in the editor window and choose &quot;Open in Browser&quot; from the context menu. Or just double-click the <code>test.html</code> in your Finder on Mac, or File Explorer on Windows.</p>

<p>Pretty simple, eh? That's really all you need to get going. You can use this page you just built as your default template for new pages, as it contains all the core elements every page should have.</p>

<p>Continue learning and playing with HTML by adding a few other elements to your page. See the <a href="http://www.w3schools.com/tags/ref_byfunc.asp">HTML Element Reference</a> for a list of possible elements and their meanings. For example, try adding the following to your page:</p>

<ul>
    <li>A <a href="http://www.w3schools.com/tags/tag_a.asp">hyperlink</a> that takes you to another page.</li>
    <li>An <a href="http://www.w3schools.com/tags/tag_ul.asp">unordered list</a> of items, and an <a href="http://www.w3schools.com/tags/tag_ol.asp">ordered list</a> of items.</li>
    <li>Some <a href="http://www.w3schools.com/tags/tag_sup.asp">superscript</a> text and some <a href="http://www.w3schools.com/tags/tag_sub.asp">subscript</a> text.</li>
    <li>A less than symbol that shows up as a <a href="http://www.w3schools.com/html/html_entities.asp">literal less-than symbol</a> rather than being interpreted as the start of an element.</li>
</ul>

<p class="alert alert-warning">Another way to experiment is to use CodePen, which is a site that lets you edit HTML, CSS, and JavaScript in your browser and see the results immediately. Give it a try using my <a href="https://codepen.io/drstearns/pen/LkJomO">Essential HTML Practice pen</a>.</p> 

<h2>Comments</h2>

<p>One last bit of syntax: every programming language should have the ability to add comments, so HTML also defines a special syntax for that. Here's what a comment looks like:</p>

<pre><code class="language-html">&lt;!-- this is a comment --&gt;</code></pre>

<p>Because that syntax is somewhat awkward to type, most source-code editors will let you comment-out the currently highlighted text by pressing <code>cmd + /</code> (or <code>ctrl + /</code> on Windows). If you're using a code editor, try highlighting a line and using that keyboard command to comment and un-comment the line.</p>

<p>Comments can appear anywhere in the file. Just as in other languages, they are ignored by any program reading the file (with a few interesting exceptions), but they do remain in the page and are visible when you view the page source.</p>

<p>We will end this with a fun story: for many years, the UW Homepage included a huge comment at the beginning containing an ASCII-art representation of the Husky 'W', which those in-the-know could see by viewing the source of the page. It looked like this:</p>

<pre><code class="language-html">&lt;!--
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWW                             WWWWWWWWW          WWWWWWWWW                      WWWWWWWWWW
WWWWWWWWWWW                             WWWWWWWWW          WWWWWWWWW                      WWWWWWWWWW
WWWWWWWWWWW                             WWWWWWWW           WWWWWWWWW                      WWWWWWWWWW
WWWWWWWWWWW                             WWWWWWWW            WWWWWWWW                      WWWWWWWWWW
WWWWWWWWWWW                             WWWWWWW             WWWWWWWW                      WWWWWWWWWW
WWWWWWWWWWWNNNNNNW              WNNNNNNWWWWWWNW              WWWWWWWNNNNNNW       WWNNNNNWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWW             WNWWWWWWWWWWWW               WWWWWWWWWWWWWW       WWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWW              WWWWWWWWWWWNW                WWWWWWWWWWWW       WNWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWW             WNWWWWWWWWWW                 WWWWWWWWWWWW       WWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWW              WWWWWWWWWNW                  WWWWWWWWWW       WNWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWW             WNWWWWWWWW                   WWWWWWWWWW       WWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWW              WWWWWWWWW                    WWWWWWWW       WWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWW             WNWWWWWW                     WWWWWWWW       WWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWW              WWWWWW       WW              WWWWWW       WWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWW             WNWWWW       WNW             WWWWNW       WWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWW              WWWW       WNWW              WWWW       WWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWW             WNWW       WWWNW             WWNW       WWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWW              WW       WNWWWW              WW       WWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWW             WW       WWWWWNW             WW       WWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWW                     WNWWWWWW                     WWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWW                    WWWWWWWNW                    WWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWW                   WWWWWWWWWW                   WWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWW                  WWWWWWWWWNW                  WWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWW                 WWWWWWWWWWWW                 WWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWW                WWWWWWWWWWWNW               WWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWW               WWWWWWWWWWWWWW               WWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWW              WWWWWWWWWWWWWN               WWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
--&gt;</code></pre>

<p>They removed this when they switched to their current site, probably because they realized that most people now browse the web on their phones. Although the comment was cool, it did slow down the data transfer and consume precious mobile network bandwidth. But you can still see this if you use the <a href="https://web.archive.org/web/20130112212418/http://www.washington.edu/">Wayback Machine</a>, a site that snapshots web pages over time, allowing you to see what sites looked like several years ago. Follow that link, and the <a href="http://www.computerhope.com/issues/ch000746.htm">view the source</a> of the page to see it!</p>

<?php 
include 'footer.php'; 
?>
