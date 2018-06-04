
    <!-- script start -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/tinymce/tinymce.min.js"></script>
    
    <script>
	 tinymce.init({
  selector: 'textarea',
  language: 'fr_FR',
  resize: 'both',
  autoresize_max_height: 20000,
  autoresize_bottom_margin: 0,
  autoresize_overflow_padding: 10,
  min_width: 200,
  forced_root_block : false, // Espace key = br a la place d'un new <p>
  paste_data_images : false, // empeche le drag & drop image 
  link_title: false, // enleve l'option Title du Link-Toolbar
  menubar: false,
  plugins: [
    'advlist autolink autoresize lists image link charmap hr print preview anchor textcolor colorpicker charactercount',
    'searchreplace visualblocks code fullscreen lineheight',
    'insertdatetime media contextmenu paste imagetools code help '
  ],
  elementpath: false,
  toolbar: 'preview | undo redo | insertdatetime image media | link charmap | styleselect | bold italic underline hr | forecolor  backcolor  textcolor colorpicker | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat ',
  content_css: ['../assets/css/style.css'],
  media_live_embeds: true,
  link_class_list: [
        {title: 'Classic (Bleu)', value: 'text-primary'},
        {title: 'Noir', value: 'text-dark'},
        {title: 'Blanc', value: 'text-white'},
        {title: 'Blanc sur fond noir', value: 'text-white bg-dark rounded px-1 mr-1'},
        {title: 'Noir sur fond blanc', value: 'btn btn-sm btn-light'},
        {title: 'PDF', value: 'btn btn-info'}
    ],
    image_class_list: [
        {title: 'Defaut', value: 'img-fluid px-1 py-1'},
    ],
         formats: {
    aligncenter: {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'text-center',
                  styles: {display: 'block', margin: '0px auto', textAlign: 'center'}},
    },
  style_formats : [
        {title : 'Paragraphe (important si image ajoutée)', block : 'p', styles: {fontFamily: 'Lato'}},
        {title : 'Titre taille 1', block : 'p', styles: {fontSize: '40px', fontFamily: 'Fresca'}},
        {title : 'Titre taille 2', block : 'p', styles: {fontSize: '32px', fontFamily: 'Fresca'}},
        {title : 'Titre taille 3', block : 'p', styles: {fontSize: '28px', fontFamily: 'Fresca'}},
        {title : 'Titre taille 4', block : 'p', styles: {fontSize: '24px', fontFamily: 'Fresca'}}
    ],
    image_caption: true,
         /*LOCALE FILE PICKER ADDON */
  image_title: true, 
  // enable automatic uploads of images represented by blob or data URIs
  automatic_uploads: true,
  // URL of our upload handler (for more details check: https://www.tinymce.com/docs/configure/file-image-upload/#images_upload_url)
  // images_upload_url: 'postAcceptor.php',
  // here we add custom filepicker only to Image dialog
  file_picker_types: 'image', 
  // and here's our custom image picker
  file_picker_callback: function(cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    
    // Note: In modern browsers input[type="file"] is functional without 
    // even adding it to the DOM, but that might not be the case in some older
    // or quirky browsers like IE, so you might want to add it to the DOM
    // just in case, and visually hide it. And do not forget do remove it
    // once you do not need it anymore.

    input.onchange = function() {
      var file = this.files[0];
      
      var reader = new FileReader();
      reader.onload = function () {
        // Note: Now we need to register the blob in TinyMCEs image blob
        // registry. In the next release this part hopefully won't be
        // necessary, as we are looking to handle it internally.
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        // call the callback and populate the Title field with the file name
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };
    
    input.click();
  }
});
    </script>
    
    
    
   

    <!-- script perso start -->
    
    <script src="../assets/js/custom-script.js"></script>
    
    <!-- script perso end -->
