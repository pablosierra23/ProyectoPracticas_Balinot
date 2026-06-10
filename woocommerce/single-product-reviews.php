<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="pt-16 woocommerce-Reviews">
	<div id="comments">
		<div class="flex justify-between items-end mb-12">
            <h3 class="font-headline text-2xl font-bold"><?php esc_html_e( 'Owner Perspectives', 'woocommerce' ); ?></h3>
            
            <?php if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) ) : ?>
                <?php $average = $product->get_average_rating(); ?>
                <div class="flex items-center gap-2">
                    <span class="font-headline text-xl font-bold"><?php echo esc_html( number_format( $average, 1 ) ); ?></span>
                    <div class="flex text-brand-gold">
                        <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' <?php echo ( $i <= round($average) ) ? '1' : '0'; ?>;">star</span>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

		<?php if ( have_comments() ) : ?>
			<div class="space-y-12 commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'prueba_theme_custom_review_callback' ) ) ); ?>
			</div>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination mt-8">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
							'next_text' => is_rtl() ? '&larr;' : '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php else : ?>
			<!-- Hardcoded reviews as placeholder if there are no real reviews -->
            <div class="space-y-12">
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-headline font-bold text-[#f5f5f5]">Marcello V.</h4>
                            <p class="font-label text-[10px] text-[#8a8a8a] tracking-widest uppercase">Verified Owner • Stuttgart, DE</p>
                        </div>
                        <div class="flex text-brand-gold scale-75">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                    </div>
                    <p class="font-body text-[#8a8a8a] italic">"The surgical precision of the steering and the instantaneous torque delivery is unlike anything else. It transitions from a comfortable grand tourer to a track monster at the press of a button. The engineering depth is visible in every stitch."</p>
                </div>
                
                <div class="space-y-4 pt-8 border-t border-[#1a1a1a]">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-headline font-bold text-[#f5f5f5]">Elena S.</h4>
                            <p class="font-label text-[10px] text-[#8a8a8a] tracking-widest uppercase">Verified Owner • Zurich, CH</p>
                        </div>
                        <div class="flex text-brand-gold scale-75">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                    </div>
                    <p class="font-body text-[#8a8a8a] italic">"The perfect daily driver for those who demand absolute performance. Even after a year of ownership, I still find excuses to take the long way home."</p>
                </div>
            </div>
		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper" class="mt-16 pt-12 border-t border-[#1a1a1a]">
			<div id="review_form">
				<?php
				$commenter    = wp_get_current_commenter();
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'woocommerce' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
					/* translators: %s is product title */
					'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
					'title_reply_before'  => '<h3 id="reply-title" class="comment-reply-title font-headline text-2xl font-bold mb-6">',
					'title_reply_after'   => '</h3>',
					'comment_notes_after' => '',
					'label_submit'        => esc_html__( 'Submit Review', 'woocommerce' ),
					'logged_in_as'        => '',
					'comment_field'       => '',
                    'class_submit'        => 'bg-brand-gold text-black font-headline font-bold py-3 px-8 uppercase tracking-widest hover:scale-[1.02] active:scale-95 transition-all duration-300 mt-6 inline-block',
				);

				$name_email_required = (bool) get_option( 'require_name_email', 1 );
				$fields              = array(
					'author' => array(
						'label'    => __( 'Name', 'woocommerce' ),
						'type'     => 'text',
						'value'    => $commenter['comment_author'],
						'required' => $name_email_required,
					),
					'email'  => array(
						'label'    => __( 'Email', 'woocommerce' ),
						'type'     => 'email',
						'value'    => $commenter['comment_author_email'],
						'required' => $name_email_required,
					),
				);

				$comment_form['fields'] = array();

				foreach ( $fields as $key => $field ) {
					$field_html  = '<p class="comment-form-' . esc_attr( $key ) . ' mb-4">';
					$field_html .= '<label for="' . esc_attr( $key ) . '" class="font-label text-xs tracking-widest uppercase text-[#8a8a8a] mb-2 block">' . esc_html( $field['label'] );

					if ( $field['required'] ) {
						$field_html .= '&nbsp;<span class="required text-brand-gold">*</span>';
					}

					$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' class="w-full bg-[#1a1a1a] border border-[#2a2a2a] text-[#f5f5f5] p-3 focus:border-brand-gold focus:ring-0 transition-colors" /></p>';

					$comment_form['fields'][ $key ] = $field_html;
				}

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] = '<div class="comment-form-rating mb-6"><label for="rating" class="font-label text-xs tracking-widest uppercase text-[#8a8a8a] mb-2 block">' . esc_html__( 'Your rating', 'woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required text-brand-gold">*</span>' : '' ) . '</label><select name="rating" id="rating" required class="w-full bg-[#1a1a1a] border border-[#2a2a2a] text-[#f5f5f5] p-3 focus:border-brand-gold focus:ring-0 transition-colors">
						<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
					</select></div>';
				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment mb-6"><label for="comment" class="font-label text-xs tracking-widest uppercase text-[#8a8a8a] mb-2 block">' . esc_html__( 'Your review', 'woocommerce' ) . '&nbsp;<span class="required text-brand-gold">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required class="w-full bg-[#1a1a1a] border border-[#2a2a2a] text-[#f5f5f5] p-3 focus:border-brand-gold focus:ring-0 transition-colors"></textarea></p>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required mt-8 text-[#8a8a8a] font-body"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
	<?php endif; ?>
</div>
