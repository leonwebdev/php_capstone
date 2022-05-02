<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= e($title); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/desktop.css" media="all and (min-width:768px)">
    <link rel="stylesheet" type="text/css" href="./styles/mobile.css" media="all and (max-width:767px)">
    <link rel="stylesheet" type="text/css" media="print" href="./styles/print.css">
    <?php if ($title == 'Timeline') : ?>
        <style>
            #timeline_section_container {
                margin: 0 auto;
                max-width: 760px;
                padding-bottom: 70px;
            }

            .timeline_img_wrapper {
                float: left;
            }

            h1 {
                font-size: 3.5em;
                padding-top: 70px;
                padding-bottom: 90px;
                padding-left: 30px;
                margin-left: 250px;
            }

            table {
                width: 700px;
                border-collapse: collapse;
                clear: both;
            }

            th,
            td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #bbb;
                font-size: 2em;
                padding-top: 30px;
                padding-bottom: 30px;
            }

            tr:nth-child(odd) th,
            tr:nth-child(odd) td {
                background-color: #eee;
            }

            th {
                padding-left: 50px;
                border-left: 5px solid #95CD40;
            }

            tr:nth-child(2) th {
                border-left: 5px solid #DF4E46;
            }

            @media screen and (max-width:767px) {

                th,
                td {
                    font-size: 20px;
                }

                table {
                    margin-left: 60px;
                    width: 410px;
                }

                #timeline_section_container h1 {
                    padding-right: 0;
                    font-size: 2em;
                    margin: 0;
                    margin-left: 30px;
                }
            }
        </style>
    <?php endif; ?>
    <link rel="icon" href="./images/favicon.png" type="image/png" />
    <link rel="apple-touch-icon" sizes="196x196" href="./images/favicon-196.png" />
    <link rel="apple-touch-icon" sizes="192x192" href="./images/favicon-192.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon-180.png" />
    <link rel="apple-touch-icon" sizes="128x128" href="./images/favicon-128.png" />
</head>

<body>

    <header>

        <div id="header_wrapper" class="main_wrapper">
            <a href="./index.php" title="Gardener Home">
                <img src="./images/logo.svg" alt="logo" width="315" height="70">
            </a>
            <nav>

                <ul id="navlist">
                    <li><a href="./" title="Gardener Home">Home</a></li>
                    <li><a href="./?p=mine" title="Gardener Mine tells you items you owns">Mine</a></li>
                    <li><a href="./?p=timeline" title="Gardener Timeline shows your tracking of your plants">Timeline</a>
                    </li>
                    <li><a href="./?p=community" title="Gardener Community shows what other people is doing">Community</a>
                    </li>
                    <li><a href="./?p=newsletter" title="Click and subscribe our newsletter weekly">Newsletter</a>
                    </li>
                </ul>

            </nav>

            <!-- <div id="hamburger_icon">
                <div class="hamburger_icon_element"></div>
                <div class="hamburger_icon_element"></div>
                <div class="hamburger_icon_element"></div>
            </div> -->

            <!-- <div id="search_bar">

                <span>Search here</span>

                <svg class="magnifier" width="24" height="24">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.98 15.395a6.294 6.294 0 111.414-1.414l4.602 4.601-1.414 1.414-4.602-4.601zm.607-5.101a4.294 4.294 0 11-8.587 0 4.294 4.294 0 018.587 0z"
                        fill="#111"></path>
                </svg>

            </div> -->

            <div id="account_login">

                <!-- <svg class="account_icon" width="24" height="24" viewBox="0 0 24 24" fill="#333"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.6724 6.4678c.2734-.2812.6804-.4707 1.3493-.4707.3971 0 .705.0838.9529.2225.241.1348.4379.3311.5934.6193l.0033.006c.1394.2541.237.6185.237 1.1403 0 .7856-.2046 1.2451-.4796 1.5278l-.0048.005c-.2759.2876-.679.4764-1.334.4764-.3857 0-.6962-.082-.956-.2241-.2388-.1344-.4342-.3293-.5888-.6147-.1454-.275-.2419-.652-.2419-1.1704 0-.7902.2035-1.2442.4692-1.5174zm1.3493-2.4717c-1.0834 0-2.054.3262-2.7838 1.0766-.7376.7583-1.0358 1.781-1.0358 2.9125 0 .7656.1431 1.483.4773 2.112l.0031.0058c.3249.602.785 1.084 1.3777 1.4154l.0062.0035c.5874.323 1.2368.4736 1.9235.4736 1.0818 0 2.0484-.3333 2.7755-1.0896.7406-.7627 1.044-1.786 1.044-2.9207 0-.7629-.1421-1.4784-.482-2.0996-.3247-.6006-.7844-1.0815-1.376-1.4125-.5858-.3276-1.2388-.477-1.9297-.477zM6.4691 16.8582c.2983-.5803.7228-1.0273 1.29-1.3572.5582-.3191 1.2834-.5049 2.2209-.5049h4.04c.9375 0 1.6626.1858 2.2209.5049.5672.3299.9917.7769 1.29 1.3572.3031.5896.4691 1.2936.4691 2.1379v1h2v-1c0-1.1122-.2205-2.1384-.6904-3.0523a5.3218 5.3218 0 0 0-2.0722-2.1769c-.9279-.5315-2.0157-.7708-3.2174-.7708H9.98c-1.1145 0-2.2483.212-3.2225.7737-.8982.5215-1.5928 1.2515-2.0671 2.174C4.2205 16.8577 4 17.8839 4 18.9961v1h2v-1c0-.8443.166-1.5483.4691-2.1379z"></path></svg> -->

                <?php require __DIR__ . '/../../modules/nav_login_detection.php'; ?>

            </div>

        </div>

    </header>