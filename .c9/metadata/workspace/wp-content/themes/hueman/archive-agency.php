{"filter":false,"title":"archive-agency.php","tooltip":"/wp-content/themes/hueman/archive-agency.php","undoManager":{"mark":4,"position":4,"stack":[[{"start":{"row":0,"column":0},"end":{"row":217,"column":0},"action":"insert","lines":["<?php get_header(); ?>","","\t<?php","\t\t$post_type          = get_post_type();","\t\t$post_type_object   = get_post_type_object($post_type);","\t\t$post_type_label    = $post_type_object->label;","\t\t$taxonomy_var       = get_query_var('taxonomy');","\t\t$term_var           = get_query_var( 'term' );","\t\t$my_term            = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );","\t\t$term_name          = $my_term->name;","\t\t$term_description   = $my_term->description;","\t?>","","\t<!-- InstanceBeginEditable name=\"contents\" -->","","    <div id=\"mainTop\">","    \t<h3><img src=\"/agency/images/title.png\" width=\"900\" height=\"150\" alt=\"仲介物件\" /></h3>","    </div>","    <div id=\"mainContents\">","    \t<p class=\"breadCrumb\"><a href=\"http://sankoujyuken.jp\">ホーム</a> &gt; 仲介物件</p>","        <div id=\"contents\">","        \t<?php get_sidebar(); ?>","  \t  \t  \t<div id=\"contentL\">","        \t\t<div id=\"agency\">","               \t\t<dl id=\"agencyTop\">","                    \t<dt>三幸住研の仲介物件</dt>","                      \t<dd>三幸住研オススメの仲介物件情報。<br />","                        地域、路線、部屋数等あなたに合った住まいがきっと見つかります。<br />","                        お客様のニーズにしっかりと応える仲介物件をご提案致します。</dd>","                    </dl>","                </div>","        \t<div id=\"agencyCopy\">","                \t<span class=\"agencyTitle\"><img src=\"/agency/images/agency_copy.png\" width=\"670\" height=\"147\" alt=\"三幸住研の仲介物件\" /></span>","                \t<p>などなど、色々な理由があります。なので今ホームページ上で公開している物件の他にもお得な物件が多数あります。<br />お気軽に三幸住研までお問い合わせください。</p>","                </div>","               \t<span class=\"agencyTitle\"><img src=\"/agency/images/title01.png\" width=\"670\" height=\"31\" alt=\"三幸住研の仲介物件\" /></span>","              \t<p>下記ボタンをクリックすると各カテゴリーの一覧が表示されます。</p>","                <ul id=\"agencyBtn\">","                \t<li><a href=\"/agency/?cat=new\"><img src=\"/agency/images/new_off.png\" width=\"122\" height=\"50\" alt=\"新築一戸建\" /></a></li>","                \t<li><a href=\"/agency/?cat=used-house\"><img src=\"/agency/images/old_off.png\" width=\"122\" height=\"50\" alt=\"中古一戸建\" /></a></li>","                \t<li><a href=\"/agency/?cat=sell\"><img src=\"/agency/images/land_off.png\" width=\"122\" height=\"50\" alt=\"売土地\" /></a></li>","                \t<li><a href=\"/agency/?cat=used-apartment\"><img src=\"/agency/images/apartment_off.png\" width=\"122\" height=\"50\" alt=\"中古マンション\" /></a></li>","                \t<li class=\"listL\"><a href=\"/agency/?cat=etc\"><img src=\"/agency/images/other_off.png\" width=\"122\" height=\"50\" alt=\"その他\" /></a></li>","                </ul>","","\t\t\t\t<?php","\t\t\t\t\t$paged = get_query_var('paged') ?  get_query_var('paged') : 1;","\t\t\t\t\t$agencyinfo = $_GET['cat'];","\t\t\t\t\tif (is_null($agencyinfo)) {","\t\t\t\t\t\t$loop = new WP_Query(","\t\t\t\t\t\t\tarray(","\t\t\t\t\t\t\t\t'post_type' => 'agency',","\t\t\t\t\t\t\t\t//'posts_per_page' => 4,","\t\t\t\t\t\t\t\t'paged' => $paged,","\t\t\t\t\t\t\t\t'order' => 'DESC',","\t\t\t\t\t\t\t\t'orderby' => 'ID',","\t\t\t\t\t\t\t)","\t\t\t\t\t\t);","\t\t\t\t\t} else {","\t\t\t\t\t\t$loop = new WP_Query(","\t\t\t\t\t\t\tarray(","\t\t\t\t\t\t\t\t'post_type' => 'agency',","\t\t\t\t\t\t\t\t//'posts_per_page' => 10,","\t\t\t\t\t\t\t\t'paged' => $paged,","\t\t\t\t\t\t\t\t'order' => 'DESC',","\t\t\t\t\t\t\t\t'orderby' => 'ID',","\t\t\t\t\t\t\t\t'tax_query' => array(","\t\t\t\t\t\t\t\t    array(","\t\t\t\t\t\t\t\t        'taxonomy' => 'agencyinfo',","\t\t\t\t\t\t\t\t        'field' => 'slug',","\t\t\t\t\t\t\t\t        'terms' => $agencyinfo","\t\t\t\t\t\t\t\t    )","\t\t\t\t\t\t\t\t)","\t\t\t\t\t\t\t)","\t\t\t\t\t\t);","\t\t\t\t\t}","\t\t\t\t\t","\t\t\t\t\tif ($loop->have_posts()): while ( $loop->have_posts() ) : $loop->the_post();","\t\t\t\t\t$agencyinfo3 = wp_get_object_terms($post->ID, \"agencyinfo\", array('fields' => 'slugs'));","\t\t\t\t\t$agencyinfo = $agencyinfo3[0];","\t\t\t\t\t","\t\t\t\t\tswitch($agencyinfo){","\t\t\t\t\t\t\tcase 'new':            $category = 'new';","\t\t\t\t\t\t\t\tbreak;","\t\t\t\t\t\t\tcase 'used-house':     $category = 'old';","\t\t\t\t\t\t\t\tbreak;","\t\t\t\t\t\t\tcase 'sell':           $category = 'land';","\t\t\t\t\t\t\t\tbreak;","\t\t\t\t\t\t\tcase 'used-apartment': $category = 'apartment';","\t\t\t\t\t\t\t\tbreak;","\t\t\t\t\t\t\tcase 'etc':            $category = 'other';","\t\t\t\t\t\t\t\tbreak;","\t\t\t\t\t}","\t\t\t\t?>","                ","                <ul id=\"<?php echo $category ?>house\">","                \t<li class=\"agencyList\">","                    \t<span class=\"agencyT\"><img src=\"/agency/images/<?php echo $category ?>T.png\" width=\"90\" height=\"25\" alt=\"\" /></span>","                        <div class=\"agencyBox\">","\t\t\t\t\t\t\t<?php if (get_post_meta($post->ID,\"完売御礼\",true)) : ?>","\t\t\t\t\t\t\t\t<div class=\"soldout\"><img src=\"/agency/images/soldout.png\" /></div>","\t\t\t\t\t\t\t<?php endif; ?>","                            <div class=\"agencyL\">","                                <p class=\"day\">更新日<?php the_time('Y.m.d'); ?></p>","\t\t\t\t\t\t\t\t<?php if (get_post_meta($post->ID,\"画像1\",true)) : ?>","\t\t\t\t\t\t\t\t\t<?php $imgsrc1 = wp_get_attachment_image_src(get_post_meta($post->ID,\"画像1\",true),thumbnail,false); ?>","\t\t\t\t\t\t\t\t\t<?php $imgsrc2 = wp_get_attachment_image_src(get_post_meta($post->ID,\"画像1\",true),full,false); ?>","\t\t\t\t\t\t\t\t\t<span class=\"bigP\"><a href=\"<?php echo $imgsrc2[0]; ?>\" rel=\"lightbox[roadtrip]\"><img src=\"<?php echo $imgsrc1[0]; ?>\" width=\"270\" height=\"200\" border=\"0\" /></a></span>","\t\t\t\t\t\t\t\t<?php else : ?>","\t\t\t\t\t\t\t\t\t<span class=\"bigP\"><img src=\"/agency/images/photo01.jpg\" width=\"270\" height=\"200\" alt=\"\" /></span>","\t\t\t\t\t\t\t\t<?php endif; ?>","                                ","                                <ul class=\"smallP\">","\t\t\t\t\t\t\t\t<?php for ($i = 2; $i <= 4;$i++): ?>","\t\t\t\t\t\t\t\t\t<?php $imgsrc1 = wp_get_attachment_image_src(get_post_meta($post->ID,\"画像${i}\",true),thumbnail,false); ?>","\t\t\t\t\t\t\t\t\t<?php $imgsrc2 = wp_get_attachment_image_src(get_post_meta($post->ID,\"画像${i}\",true),full,false); ?>","\t\t\t\t\t\t\t\t\t<?php if ($i === 4) : ?>","\t\t\t\t\t\t\t\t\t\t<li class=\"listL\">","\t\t\t\t\t\t\t\t\t<?php else : ?>","\t\t\t\t\t\t\t\t\t\t<li>","\t\t\t\t\t\t\t\t\t<?php endif; ?>","\t\t\t\t\t\t\t\t\t<?php if (get_post_meta($post->ID,\"画像${i}\",true)) : ?>","\t\t\t\t\t\t\t\t\t\t<a href=\"<?php echo $imgsrc2[0]; ?>\" rel=\"lightbox[roadtrip]\"><img src=\"<?php echo $imgsrc1[0]; ?>\" width=\"80\" height=\"80\" border=\"0\" /></a></li>","\t\t\t\t\t\t\t\t\t<?php else : ?>","\t\t\t\t\t\t\t\t\t\t<img src=\"/agency/images/photo02.jpg\" border=\"0\" alt=\"\" /></li>","\t\t\t\t\t\t\t\t\t<?php endif; ?>","\t\t\t\t\t\t\t\t<?php endfor; ?>","                                </ul>","                            </div>","                            <div class=\"agencyR\">","                                <dl class=\"property\">","                                    <dt>物件名称</dt>","                                    <dd><?php the_title(); ?></dd>","                                </dl>","                                <div class=\"agencyLine\">","                                    <p class=\"price\">価格／<span class=\"red\"><?php echo get_post_meta($post->ID,\"価格\",true); ?></span>万円（<?php echo get_post_meta($post->ID,\"消費税\",true); ?>）</p>","                                    <p class=\"ad\">住所／<?php echo get_post_meta($post->ID,\"住所\",true); ?></p>","                                    <p class=\"ac\">交通／<?php echo get_post_meta($post->ID,\"交通\",true); ?></p>","                                </div>","                                ","                                <!-- 新築一戸建/中古一戸建 -->","                                <?php if ($agencyinfo === \"new\" || $agencyinfo === \"used-house\") : ?>","\t                                <div class=\"agencyOl\">","\t                                    <ul class=\"agencyOlL\">","\t                                        <li>■建ぺい率／<?php echo get_post_meta($post->ID,\"建ぺい率\",true); ?>％</li>","\t                                        <li>■構造／<?php echo get_post_meta($post->ID,\"構造\",true); ?></li>","\t                                        <li>■敷地面積／<?php echo get_post_meta($post->ID,\"敷地面積\",true); ?>㎡</li>","\t                                    </ul>","\t                                    <ul class=\"agencyOlR\">","\t                                        <li>■容積率／<?php echo get_post_meta($post->ID,\"容積率\",true); ?>％</li>","\t                                        <li>■間取り／<?php echo get_post_meta($post->ID,\"間取り\",true); ?></li>","\t                                        <li>■建延面積／<?php echo get_post_meta($post->ID,\"建延面積\",true); ?>㎡</li>","\t                                    </ul>","\t                                    <ul>","\t                                        <li>■用途地域／<?php echo get_post_meta($post->ID,\"用途地域\",true); ?></li>","\t                                    </ul>","\t                                </div>","                                ","                                <!-- 中古マンション -->","                                <?php elseif ($agencyinfo === 'used-apartment') : ?>","\t                                <div class=\"agencyOl\">","\t                                    <ul class=\"agencyOlL\">","\t                                        <li>■築年数／<?php echo get_post_meta($post->ID,\"築年数\",true); ?></li>","\t                                        <li>■専有面積／<?php echo get_post_meta($post->ID,\"専有面積\",true); ?>㎡</li>","\t                                    </ul>","\t                                    <ul class=\"agencyOlR\">","\t                                        <li>■間取り／<?php echo get_post_meta($post->ID,\"間取り\",true); ?></li>","\t                                        <li>■バルコニー面積／<?php echo get_post_meta($post->ID,\"バルコニー面積\",true); ?>㎡</li>","\t                                    </ul>","\t                                    <ul>","\t                                        <li>■建物構造／<?php echo get_post_meta($post->ID,\"建物構造\",true); ?></li>","\t                                    </ul>","\t                                </div>","\t                                ","                                <!-- 売土地 -->","                                <?php elseif ($agencyinfo === \"sell\") : ?>","\t                                <div class=\"agencyOl\">","\t                                    <ul class=\"agencyOlL\">","\t                                        <li>■建ぺい率／<?php echo get_post_meta($post->ID,\"建ぺい率\",true); ?>％</li>","\t                                        <li>■敷地面積／<?php echo get_post_meta($post->ID,\"敷地面積\",true); ?>㎡</li>","\t                                    </ul>","\t                                    <ul class=\"agencyOlR\">","\t                                        <li>■容積率／<?php echo get_post_meta($post->ID,\"容積率\",true); ?>％</li>","\t                                        <li>■建延面積／<?php echo get_post_meta($post->ID,\"建延面積\",true); ?>㎡</li>","\t                                    </ul>","\t                                    <ul>","\t                                        <li>■用途地域／<?php echo get_post_meta($post->ID,\"用途地域\",true); ?></li>","\t                                    </ul>","\t                                </div>","\t                                ","                                ","                                <!-- その他 -->","                                <?php elseif ($agencyinfo === \"etc\") : ?>","                                ","                                <?php endif; ?>","                                <dl class=\"remarks\">","                                    <dt>備　考</dt>","                                    <dd><?php echo wpautop(get_post_meta($post->ID,\"備考\",true)); ?></dd>","                                </dl>","                            </div>","                        </div>","                   \t  \t<div class=\"agencyContact\"><a href=\"../contact/?id=<?php the_title(); ?>\"><img src=\"/agency/images/contact_off.png\" width=\"325\" height=\"30\" alt=\"お問い合わせはこちら\" /></a></div>","                  \t</li>","                </ul>","                ","\t\t\t\t<?php endwhile; ?>","\t\t\t\t<?php else: ?>","\t\t\t\t<p>登録データがありません。</p>","\t\t\t\t<?php endif; ?>","                ","                <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(array('query'=>$loop)); } ?>","","            </div>","            <span id=\"fotcontact\"><a href=\"/contact/\"><img src=\"/common/footer_contact_off.png\" width=\"900\" height=\"120\" alt=\"&#9742;06-0844-0105\" /></a></span>","        </div>","    </div>","<?php get_footer(); ?>",""],"id":1}],[{"start":{"row":136,"column":88},"end":{"row":136,"column":92},"action":"remove","lines":["\"住所\""],"id":2},{"start":{"row":136,"column":88},"end":{"row":136,"column":106},"action":"insert","lines":["'Additional rooms'"]}],[{"start":{"row":136,"column":50},"end":{"row":136,"column":52},"action":"remove","lines":["住所"],"id":3},{"start":{"row":136,"column":50},"end":{"row":136,"column":68},"action":"insert","lines":["'Additional rooms'"]}],[{"start":{"row":136,"column":67},"end":{"row":136,"column":68},"action":"remove","lines":["'"],"id":4}],[{"start":{"row":136,"column":50},"end":{"row":136,"column":51},"action":"remove","lines":["'"],"id":5}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":134,"column":50},"end":{"row":134,"column":54},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1435889700559,"hash":"3fdf3dbacf4e676bf7edc8845be9f40ab82a657a"}