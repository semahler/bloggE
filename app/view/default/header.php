<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="/static/css/uikit.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <link rel="stylesheet" href="/static/css/styles.css"/>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>"
    <script type="text/javascript" src="/static/js/uikit.js"></script>
    <script type="text/javascript" src="/static/js/uikit-icons.js"></script>
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="/static/js/scripts.js"></script>

    <title><?php echo isset($this->view_data['title']) ? $this->view_data['title'] : 'bloggE - Startseite'; ?></title>
</head>
<body>
    <header>
        <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #sticky-dropdown">
            <nav class="uk-navbar-container uk-box-shadow-small">
                <div class="uk-container">
                    <div uk-navbar>
                        <div class="uk-navbar-left">
                            <ul class="uk-navbar-nav">
                                <li class="uk-active"><a href="/">Home</a></li>
                                <li>
                                    <a href="#">Admin</a>
                                    <div class="uk-navbar-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li class=""><a href="/admin/new-post">New Post</a></li>
                                            <li class=""><a href="/admin/edit-post">Edit Post</a></li>
                                            <li class=""><a href="/admin/upload-picture">Upload Pictures</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="uk-navbar-center">
                            <a class="uk-logo" href="#">Logo</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>

