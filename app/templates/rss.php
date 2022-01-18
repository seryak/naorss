<?=$this->e('<?xml version="1.0" encoding="utf-8"?>')?>
<rss xmlns:yandex="http://news.yandex.ru" xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:media="http://search.yahoo.com/mrss/"
     xmlns:turbo="http://turbo.yandex.ru" version="2.0">
    <channel>
        <title>Новости Нарьян-Мара сегодня – Последние события в НАО – Информационное агентство NAO24.RU</title>
        <link>https://nao24.ru/</link>
        <language>ru</language>
        <description>Новости Нарьян-Мара сегодня – Последние события в НАО – Информационное агентство NAO24.RU</description>
        <yandex:logo>https://nao24.ru/yandexlogo.png</yandex:logo>
        <yandex:logo type="square">https://nao24.ru/yandexsquarelogo.png</yandex:logo>
        <generator>Wtolk Rss</generator>
        <?php
            foreach ($feed->itemCollections as $key => $item) {
                echo $item;
            }
        ?>
    </channel>
</rss>
