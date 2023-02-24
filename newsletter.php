    <form class="first" action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>" method="post">
      <label for="email">Subscribe to our newsletter </label>
      <input type="email" id="email" name="email" required>
      <input type="submit" value="Subscribe">
    </form>





	
		  <!-- Main Content -->
<div>
			<h1>
				<?php echo esc_html__( 'Add New form', '' ); ?>
			</h1>
			
			<div style="max-width:60%;">

				<!-- Wrap entire page in <form> -->
				<form method="post">
					<div>
						<h3>
							<label>
								<?php echo esc_html__( 'What is the name of this form?', '' ); ?>
							</label>
						</h3>
						<input type="text" name="mc4wp_form[name]" class="widefat"
             value="" spellcheck="true" autocomplete="off" 
             placeholder="<?php echo esc_attr__( 'Enter your form title....', '' ); ?>">
					</div>			
				</form>

			</div>
</div>




<div class="tabs">
  <input type="radio" name="tabs" id="tabone" checked="checked">
  <label for="tabone">Fields</label>
  <div class="tab">      
          <div class="main-editor" style="width:800px;">
          <button class="rathore">Run</button>
          <div  class="hr1" contenteditable>
            writecode
          </div>
            <iframe class="hr2" >
           
            </iframe>
          </div>
  </div>

  <!-- secound tab button -->
  <input type="radio" name="tabs" id="tabtwo">
  <label for="tabtwo">Messages</label>
  <div class="tab">
    <h1>Tab Two Content</h1>
    <p><p class=""><?php printf( esc_html__( 'Use the shortcode %s to display this form inside a post, page or text widget.', 'mailchimp-for-wp' ), '<input type="text" onfocus="this.select();" readonly="readonly" value="' . esc_attr( sprintf( '[mc4wp_form id=%d]', $form->ID ) ) . '" size="' . ( strlen( $form->ID ) + 15 ) . '">' ); ?></p></p>
  </div>
  
  <!-- three tab button -->
  <input type="radio" name="tabs" id="tabthree">
  <label for="tabthree">Settings</label>
  <div class="tab">
    <h1> Content</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
  </div>

  <!-- four tab button -->
  <input type="radio" name="tabs" id="tabfour">
  <label for="tabfour">Appearance</label>
  <div class="tab">
    <h1> Content</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
  </div>
</div>







 
</div>





















