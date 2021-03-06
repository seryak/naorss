<item turbo="true">
    <title><?= $this->e($item->attributes['title']) ?></title>
    <link><?= $this->e($item->attributes['link']) ?></link>
    <description><?= $this->e($item->attributes['description']) ?></description>
    <category><?= $this->e($item->attributes['category']) ?></category>
    <enclosure url="https://nao24.ru/uploads/posts/2022-01/1642326405_photo_2022-01-16_12-40-09.jpg" type="image/jpeg"/>
    <pubDate><?= $this->e($item->attributes['pubDate']) ?></pubDate>
    <yandex:full-text><?= $this->e($item->attributes['yandex:full-text']) ?></yandex:full-text>
    <?php if (isset($item->attributes['yandex:official-comment'])): ?>
        <yandex:official-comment>
            <yandex:comment-text
                origin="<?= $this->e($item->attributes['yandex:official-comment']['origin']) ?>"
                origin-name="<?= $this->e($item->attributes['yandex:official-comment']['origin-name']) ?>"
            ><?= $this->e($item->attributes['yandex:official-comment']['yandex-comment-text']) ?></yandex:comment-text>

            <?php foreach($this->attributes['yandex:official-comment']['yandex:bind-to'] as $link): ?>
                <yandex:bind-to><?= $this->e($link) ?></yandex:bind-to>
            <?php endforeach ?>

        </yandex:official-comment>
    <?php endif ?>

    <turbo:content>
        <![CDATA[ <?= $this->e($item->attributes['yandex:full-text']) ?> ]]></turbo:content>
</item>
