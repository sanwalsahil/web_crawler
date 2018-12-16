<?php
//echo "<pre>";print_r($_POST);die;
ini_set("memory_limit", "1024M");
ini_set("max_execution_time", "999");
$main_url = $_POST['web_url'];
$str = file_get_contents($main_url);

// Gets Webpage Title
if (strlen($str) > 0) {
    $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
    preg_match("/\<title\>(.*)\<\/title\>/i", $str, $title); // ignore case
    $title = $title[1];
}

// Gets Webpage Description
$b = $main_url;
@$url = parse_url($b);
@$tags = get_meta_tags($url['scheme'] . '://' . $url['host']);
if (isset($tags['description'])) {
    $description = $tags['description'];
} else {
    $description = 'N/A';
}



// Gets Webpage Internal Links
$doc = new DOMDocument;
@$doc->loadHTML($str);

$items = $doc->getElementsByTagName('a');

foreach ($items as $value) {
    $attrs = $value->attributes;
    $sec_url[] = $attrs->getNamedItem('href')->nodeValue;
}
$all_links = implode(",", $sec_url);
?>

<html>
    <head>
        <title>Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="col-md-12">
                <span style="display:inline-block;padding:5px">
                    <b>Website Url : </b> <?= $main_url ?>
                </span>
                <span style="display:inline-block;padding:5px">
                    <b>Website Description : </b> <?= $description ?>
                </span>
                
            </div>
            <div class="col-md-12">
                <table class="table striped">
                    <thead>
                        <tr>
                            <th> Link <th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sec_url as $link) { ?>
                            <tr>
                                <td><?= $link; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>