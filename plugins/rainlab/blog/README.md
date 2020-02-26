# Blog Plugin

A simple, extensible blogging platform for October CMS.

[Blog & Forum Building Tutorial Video](https://player.vimeo.com/video/97088926)

## Editing courses

The plugin uses the markdown markup for the courses. You can use any Markdown syntax and some special tags for embedding images and videos (requires RainLab Blog Video plugin). To embed an image use the image placeholder:

    ![1](image)

The number in the first part is the placeholder index. If you use multiple images in a course you should use an unique index for each image:

    ![1](image)

    ![2](image)

You can also add classes or ids to images by using the [markdown extra](http://michelf.ca/projects/php-markdown/extra/) syntax:

    ![1](image){#id .class}

## Excerpt Vs. Read more

Courses are managed by selecting *Blog > Courses* from the menu. Each course can contain an excerpt by entering some text in this field on the *Manage* tab. This content is displayed on the page using the `summary` attribute of the blog course.

    {{ course.summary|raw }}

Alternatively this field can be left blank and the excerpt can be captured from the main content (*Edit* tab). Use the special tag `<!-- more -->` to specify a summary from the main content, all content above this tag will be treated as the summary. For example:

    This is a great introduction to a great blog course. This text is included as part of the excerpt / summary.

    <!-- more -->

    Let's dive in to more detail about why this course is so great. This text will not be included in the summary.

Finally, if no excerpt is specified and the "more" tag is not used, the blog course will capture the first 600 characters of the content and use this for the summary.

## Implementing front-end pages

The plugin provides several components for building the course list page (archive), category page, course details page and category list for the sidebar.

### Course list page

Use the `blogCourses` component to display a list of latest blog courses on a page. The component has the following properties:

* **pageNumber** - this value is used to determine what page the user is on, it should be a routing parameter for the default markup. The default value is **{{ :page }}** to obtain the value from the route parameter `:page`.
* **categoryFilter** - a category slug to filter the courses by. If left blank, all courses are displayed.
* **coursesPerPage** - how many courses to display on a single page (the pagination is supported automatically). The default value is 10.
* **noCoursesMessage** - message to display in the empty course list.
* **sortOrder** - the column name and direction used for the sort order of the courses. The default value is **published_at desc**.
* **categoryPage** - path to the category page. The default value is **blog/category** - it matches the pages/blog/category.htm file in the theme directory. This property is used in the default component partial for creating links to the blog categories.
* **coursePage** - path to the course details page. The default value is **blog/course** - it matches the pages/blog/course.htm file in the theme directory. This property is used in the default component partial for creating links to the blog courses.
* **exceptCourse** - ignore a single course by its slug or unique ID. The ignored course will not be included in the list, useful for showing other/related courses.
* **exceptCategories** - ignore courses from a comma-separated list of categories, given by their unique slug. The ignored courses will not be included in the list.

The blogCourses component injects the following variables to the page where it's used:

* **courses** - a list of blog courses loaded from the database.
* **coursePage** - contains the value of the `coursePage` component's property.
* **category** - the blog category object loaded from the database. If the category is not found, the variable value is **null**.
* **categoryPage** - contains the value of the `categoryPage` component's property.
* **noCoursesMessage** - contains the value of the `noCoursesMessage` component's property.

The component supports pagination and reads the current page index from the `:page` URL parameter. The next example shows the basic component usage on the blog home page:

    title = "Blog"
    url = "/blog/:page?"

    [blogCourses]
    coursesPerPage = "5"
    ==
    {% component 'blogCourses' %}

The next example shows the basic component usage with the category filter:

    title = "Blog Category"
    url = "/blog/category/:slug/:page?"

    [blogCourses]
    categoryFilter = "{{ :slug }}"
    ==
    function onEnd()
    {
        // Optional - set the page title to the category name
        if ($this->category)
            $this->page->title = $this->category->name;
    }
    ==
    {% if not category %}
        <h2>Category not found</h2>
    {% else %}
        <h2>{{ category.name }}</h2>

        {% component 'blogCourses' %}
    {% endif %}

The course list and the pagination are coded in the default component partial `plugins/rainlab/blog/components/courses/default.htm`. If the default markup is not suitable for your website, feel free to copy it from the default partial and replace the `{% component %}` call in the example above with the partial contents.

### Course page

Use the `blogCourse` component to display a blog course on a page. The component has the following properties:

* **slug** - the value used for looking up the course by its slug. The default value is **{{ :slug }}** to obtain the value from the route parameter `:slug`.
* **categoryPage** - path to the category page. The default value is **blog/category** - it matches the pages/blog/category.htm file in the theme directory. This property is used in the default component partial for creating links to the blog categories.

The component injects the following variables to the page where it's used:

* **course** - the blog course object loaded from the database. If the course is not found, the variable value is **null**.

The next example shows the basic component usage on the blog page:

    title = "Blog Course"
    url = "/blog/course/:slug"

    [blogCourse]
    ==
    <?php
    function onEnd()
    {
        // Optional - set the page title to the course title
        if ($this->course)
            $this->page->title = $this->course->title;
    }
    ?>
    ==
    {% if course %}
        <h2>{{ course.title }}</h2>

        {% component 'blogCourse' %}
    {% else %}
        <h2>Course not found</h2>
    {% endif %}

The course details is coded in the default component partial `plugins/rainlab/blog/components/course/default.htm`.

### Category list

Use the `blogCategories` component to display a list of blog course categories with links. The component has the following properties:

* **slug** - the value used for looking up the current category by its slug. The default value is **{{ :slug }}** to obtain the value from the route parameter `:slug`.
* **displayEmpty** - determines if empty categories should be displayed. The default value is false.
* **categoryPage** - path to the category page. The default value is **blog/category** - it matches the pages/blog/category.htm file in the theme directory. This property is used in the default component partial for creating links to the blog categories.

The component injects the following variables to the page where it's used:

* **categoryPage** - contains the value of the `categoryPage` component's property. 
* **categories** - a list of blog categories loaded from the database.
* **currentCategorySlug** - slug of the current category. This property is used for marking the current category in the category list.

The component can be used on any page. The next example shows the basic component usage on the blog home page:

    title = "Blog"
    url = "/blog/:page?"

    [blogCategories]
    ==
    ...
    <div class="sidebar">
        {% component 'blogCategories' %}
    </div>
    ...

The category list is coded in the default component partial `plugins/rainlab/blog/components/categories/default.htm`.

### RSS feed

Use the `blogRssFeed` component to display an RSS feed containing the latest blog courses. The following properties are supported:

* **categoryFilter** - a category slug to filter the courses by. If left blank, all courses are displayed.
* **coursesPerPage** - how many courses to display on the feed. The default value is 10.
* **blogPage** - path to the main blog page. The default value is **blog** - it matches the pages/blog.htm file in the theme directory. This property is used in the RSS feed for creating links to the main blog page.
* **coursePage** - path to the course details page. The default value is **blog/course** - it matches the pages/blog/course.htm file in the theme directory. This property is used in the RSS feed for creating links to the blog courses.

The component can be used on any page, it will hijack the entire page cycle to display the feed in RSS format. The next example shows how to use it:

    title = "RSS Feed"
    url = "/blog/rss.xml"

    [blogRssFeed]
    blogPage = "blog"
    coursePage = "blog/course"
    ==
    <!-- This markup will never be displayed -->

## Markdown guide

October supports [standard markdown syntax](http://daringfireball.net/projects/markdown/) as well as [extended markdown syntax](http://michelf.ca/projects/php-markdown/extra/)

### Classes and IDs

Classes and IDs can be added to images and other elements as shown below:

```
[link](url){#id .class}
![1](image){#id .class}
# October  {#id .class}
```

### Fenced code blogs

Markdown extra makes it possible to use fenced code blocks. With fenced code blocks you do not need indentation on the areas you want to mark as code:


    ```
    Code goes here
    ```
    
You can also use the `~` symbol:

    ~~~
    Code goes here
    ~~~

### Tables

A *simple* table can be defined as follows:

```
First Header  | Second Header
------------- | -------------
Content Cell  | Content Cell 
Content Cell  | Content Cell 
```

If you want to you can also add a leading and tailing pipe:

```
| First Header  | Second Header |
| ------------- | ------------- |
| Content Cell  | Content Cell  |
| Content Cell  | Content Cell  |
```

To add alignment to the cells you simply need to add a `:` either at the start or end of a separator:

```
| First Header  | Second Header |
| :------------ | ------------: |
| Content Cell  | Content Cell  |
| Content Cell  | Content Cell  |
```

To center align cell just add `:` on both sides:

```
| First Header  | Second Header |
| ------------- | :-----------: |
| Content Cell  | Content Cell  |
| Content Cell  | Content Cell  |
```

### Definition lists

Below is an example of a simple definition list:

```
Laravel
:   A popular PHP framework

October
:   Awesome CMS built on Laravel
```

A term can also have multiple definitions:

```
Laravel
:   A popular PHP framework

October
:   Awesome CMS built on Laravel
:   Supports markdown extra
```

You can also associate more than 1 term to a definition:

```
Laravel
October
:   Built using PHP
```

### Footnotes

With markdown extra it is possible to create reference style footnotes:

```
This is some text with a footnote.[^1]

[^1]: And this is the footnote.
```

### Abbreviations

With markdown extra you can add abbreviations to your markup. The use this functionality first create a definition list:

```
*[HTML]: Hyper Text Markup Language
*[PHP]:  Hypertext Preprocessor
```

Now markdown extra will convert all occurrences of `HTML` and `PHP` as follows:

```
<abbr title="Hyper Text Markup Language">HTML</abbr>
<abbr title="Hypertext Preprocessor">PHP</abbr>
```
