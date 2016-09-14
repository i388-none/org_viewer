<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
        <title>Log View</title>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
        <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <style type="text/css">
         /* Material iconsを利用する */
         .material-icons {
             font-family: 'Material Icons';
             font-weight: normal;
             font-style: normal;
             font-size: 24px;  /* 推奨サイズ */
             display: inline-block;
             width: 1em;
             height: 1em;
             line-height: 1;
             text-transform: none;

             /* WebKitブラウザサポート */
             -webkit-font-smoothing: antialiased;
             /* Chrome、Safariサポート */
             text-rendering: optimizeLegibility;

             /* Firefoxサポート */
             -moz-osx-font-smoothing: grayscale;

             /* IEサポート */
             font-feature-settings: 'liga';
         }

         /* アイコンサイズ */
         .material-icons.md-18 { font-size: 18px; }
         .material-icons.md-24 { font-size: 24px; }
         .material-icons.md-36 { font-size: 36px; }
         .material-icons.md-48 { font-size: 48px; }

         /* 背景が明るいとき用のアイコン色 */
         .material-icons.md-dark { color: rgba(0, 0, 0, 0.54); }
         .material-icons.md-dark.md-inactive { color: rgba(0, 0, 0, 0.26); }

         /* 背景が暗いとき用のアイコン色 */
         .material-icons.md-light { color: rgba(255, 255, 255, 1); }
         .material-icons.md-light.md-inactive { color: rgba(255, 255, 255, 0.3); }

         body {
             margin:0;
             padding:0;
             width:100%;
         }
     
         #lists{
             width:15%;
             float:left;
             text-align:center;
         }
         #log_view{
             width:84%;         
             float:right;
             border-left:solid 1px blue;
         }
        </style>
        
        <script type="text/javascript">
            $(function(){
            　$("#datepicker").datepicker();
            });
        </script>
    </head>
    <body>
        <div id="lists">
            <div>
                <input type="text" id="datepicker">
                <i class="material-icons md-24">search</i>
            </div>
            
            <?php
            $log_lists = glob("./*-log.html");

            echo '<p class="log"><a href="list.php?h=todo.html">TODO List</a></p>';
            foreach ($log_lists as $val) {
                $ymd = explode("-",$val);
                preg_match("/(^[0-9]{2})([0-9]{2}$)/",$ymd[1],$md); 
                $ymd = str_replace("./","",$ymd[0])."/".$md[1]."/".$md[2];
                echo '<p class="log"><a href="list.php?h='.$val.'">'.$ymd.'</a></p>';
            }
            ?>
        </div>
        <div id="log_view"><iframe allowTransparency="true" style="border: 0;width: 100%;height:100%" scrolling="yes" frameborder="no" src="<?php echo $_GET['h']; ?>" /></div>
        <div style="clear:both"></div>
    </body>
</html>
