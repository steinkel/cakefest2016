<h3>Completed campaigns</h3>
<ul>
    <?php foreach ($completed as $campaign) :?>
    <li><?= h($campaign->name); ?></li>
    <?php endforeach; ?>
</ul>

