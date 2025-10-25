<?php

namespace Simple_Elementor_pagination_Addon;

if (!defined('ABSPATH')) {
    exit;
}

use Elementor\Widget_Base;

class Elementor_Code_Scaffold extends Widget_Base
{
    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);
    }

    public function get_script_depends()
    {
        return [];
    }
    public function get_style_depends()
    {
        return [];
    }
    public function get_name()
    {
        return 'code-pattern-widget';
    }

    public function get_title()
    {
        return \esc_html__('Simple Pagination Widget', 'json-pagenation');
    }

    public function get_icon()
    {
        return 'eicon-inner-section';
    }

    public function get_keywords(): array
    {
        return ['pagination', 'simple pagination'];
    }

    public function get_categories()
    {
        return ['general'];
    }

    protected function register_controls() {}

    protected function render()
    {
        $page_id = isset($_GET['my_page']) ? intval($_GET['my_page']) : 1;
        $base_url = get_permalink();

        // Load JSON data
        $json_path = plugin_dir_path(__FILE__) . '../data/data.json';
        $json_data = [];
        if (file_exists($json_path)) {
            $json_content = file_get_contents($json_path);
            $json_data = json_decode($json_content, true);
        }

        // Pagination logic
        $items_per_page = 4;
        $total_items = count($json_data);
        $total_pages = ceil($total_items / $items_per_page);
        $page_id = max(1, min($page_id, $total_pages)); // Ensure valid page

        $start = ($page_id - 1) * $items_per_page;
        $items = array_slice($json_data, $start, $items_per_page);
?>
        <div class="pagenation-widget">
            <h2>
                The Page id is : <span style="color:blue;"><?php echo esc_html($page_id); ?></span>
            </h2>
            <div class="pagenate">
                <?php if (!empty($items)): ?>
                    <ul>
                        <?php foreach ($items as $item): ?>
                            <li>
                                <?php echo esc_html(isset($item['title']) ? $item['title'] : json_encode($item)); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No items found.</p>
                <?php endif; ?>
            </div>
            <ul class="pagination" style="list-style:none; padding-left:0; margin-left:0;">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li<?php if ($i == $page_id) echo ' style="font-weight:bold; display:inline; margin-right:8px;"';
                        else echo ' style="display:inline; margin-right:8px;"'; ?>>
                        <a href="<?php echo esc_url(add_query_arg('my_page', $i, $base_url)); ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
            </ul>
        </div>
<?php
    }
}
