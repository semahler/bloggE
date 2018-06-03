<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/css/uikit.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplemde/1.11.2/simplemde.min.css">
    <link rel="stylesheet" href="/static/css/styles.css"/>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.2/js/uikit-icons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplemde/1.11.2/simplemde.min.js"></script>
    <script src="/static/js/scripts.js"></script>

    <title><?php echo isset($this->view_data['title']) ? $this->view_data['title'] : 'bloggE - Startseite'; ?></title>
</head>
<body>
    <header>
        <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #sticky-dropdown">
            <nav class="uk-navbar-container uk-box-shadow-small uk-section-muted">
                <div class="uk-container">
                    <div uk-navbar>
                        <div class="uk-navbar-left">
                            <a class="uk-navbar-item uk-logo" href="/"><img data-src="/static/logo.png" width="" height="100%" alt="" uk-img></a>
                        </div>

                        <div class="uk-navbar-right">
                            <ul class="uk-navbar-nav uk-visible@m">
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
                            <div class="uk-navbar-item">
                                <a class="uk-navbar-toggle uk-hidden@s" data-uk-toggle data-uk-navbar-toggle-icon href="#offcanvas-nav"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>

