
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>


<div class="uk-width-1-2 uk-card uk-card-primary uk-card-body" >
	<h3>Create New Invoice </h3>
	<div id="editor">
		<p>Editor content goes here.</p>
	</div>
	<a class="uk-button uk-button-default" href="#">Submit</a>
</div>
<div class="uk-width-1-4 uk-card uk-card-default uk-card-body" >
	<h3> Select A Client </h3>
	<select class="uk-select" id="form-horizontal-select">
		<option>John Doe</option>
		<option>Joe Grase</option>
	</select>
	<h3>OR </h3>
	<a class="uk-button uk-button-default" href="#">Add New Client</a>
</div>



<script type="text/javascript">
	
var editor = null;
ClassicEditor.create(document.querySelector("#editor"), {
  toolbar: [
    "headings",
    "bold",
    "italic",
    "link",
    "bulletedList",
    "numberedList",
    "blockQuote",
    "insertimage",
    "undo",
    "redo"
  ]
})
  .then(editor => {
    //debugger;
    window.editor = editor;
  })
  .catch(error => {
    console.error(error);
  });


</script>