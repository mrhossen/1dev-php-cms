

tinymce.init({
    selector: 'textarea',  // change this value according to your HTML
    theme: 'modern',
    plugins: [
        'advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'save table contextmenu directionality emoticons template paste textcolor'
      ],
      content_css: 'css/content.css',
      toolbar: 'insertfile | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | undo redo ',
    menubar: false,
    height: 400
  });
  
  // JS for check all post

 $(document).ready(function(){

  $('#checkBoxAll').click(function(event){

    if(this.checked) {

      $('.checkbox').each(function(){

        this.checked = true;

      });

    } else {

      $('.checkbox').each(function(){

        this.checked = false;

      });

    }



  });

 });

 window.FontAwesomeConfig = {
  searchPseudoElements: true
}