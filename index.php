<html>
    <head>
        <title>Web Crawler</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="col-md-12">
                <h2>WEB CRAWLER</h2>
            </div>
            <div class="col-md-12">
                <form action="crawl.php" method="post">
                    <div class="form-group">
                        <label>Website Url</label>
                        <input class="form-control" type="text" name="web_url">
                    </div>
                    <div>
                        <input type="submit" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </body>
    
</html>