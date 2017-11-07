    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <?php
               
                foreach($menu as $key => $value) {
                    $cssClass = '';

                    if (sizeof($value['children']) > 0) {    
                    
                        $child_html = '';
                        foreach ($value['children'] as $item) {
                            $childCssClass = '';
                            if ($item['id'] == $active_menu) {
                                $childCssClass = $cssClass = ' active';
                            }
                            $child_html .=
                            '<li class="' . $childCssClass . '"> ' 
                            . '<a href="' . $item['url'] . '">'
                            . '<i class="fa fa-circle-o"></i>' . $item['name']
                            . '</a>'
                            . '</li>';
                        }

                        $cssClass = $cssClass == '' ? '' : $cssClass . ' menu-open';
                        echo '<li class="treeview ' . $cssClass . '">'
                            . '<a href="#">' 
                            . '<i class="' . $value['icon'] . '"></i>'
                            . '<span>'. $value['name'] . '</span>'
                            . '</a>'
                            . '<ul class="treeview-menu">' . $child_html . '</ul>'
                         . '</li>';
                    } else {
                        if ($value['id'] == $active_menu) {
                            $cssClass = 'active';
                        } 
                        echo 
                        '<li class="' . $cssClass .'">' 
                        . '<a href=' . $value['url'] . '>'
                        . '<i class="' . $value['icon'] . '"></i><span>' . $value['name'] . '</span>'
                        . '</a></li>';
                    }
                    
                }?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>