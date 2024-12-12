    </main>
<footer container class="siteFooter">
        <p>Χρησιμοποιείτα το <a href="https://concisecss.com/">Concise CSS</a></p>
        <p><?php
date_default_timezone_set("Europe/Athens");
print(date('l d/m/Y G:i:s T'));
?></p>
    </footer>
</body>
</html>
<?php
ob_end_flush();
?>