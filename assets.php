<link href="https://fonts.googleapis.com/css?family=Spartan:200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700,800,900" rel="stylesheet">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">;

function closeModal(modalToClose){
$('#closeModal').click( function (){
$(modalToClose).modal('hide');     
}); 
}
</script>	

<style>
body, h1,h2,h3,h4,h5,h6, .form-control{
font-family:Spartan,Work Sans;font-weight:700;margin-bottom:20px;
}

h1{font-size:25px;text-align:center;font-weight:800;
margin-bottom:25px;
}
h2{font-size:24px !important;font-weight:800 !important;}
.btn-tomato{height:55px;color:#fff;background-color:#FF4450 !important;font-size:13px;border-radius:5px;border:0;padding-left:25px;color:#fff !important;padding-right:25px;color:#fff;font-family:Spartan,Work Sans;}

.fa-search{color:#fff;}
.input-text{height:55px;font-size:12px;width:100%;border-radius:5px;border:1px solid #dfdfdf;}
.grid_x{display:grid;grid-template-columns:80% 20%;grid-gap:2px;}
.input-text{border:1px solid #afafaf !important;}	
small{font-size:12px;font-weight:600;font-family:Spartan, Work Sans;color:#000;}
.modal-heading{font-family:Spartan,Work Sans;font-weight:500}
.close-btn{
border-radius:50%;border:0;background:#efefef;color:#000;width:50px;height:50px;font-size:12px;margin-top:-12px;position:relative;top:-5px;z-index:1;
}
.text-primary, .text-warning, .text-info, .text-danger, .text-black, .text-success{font-family:Spartan, Work Sans !important;font-weight:600;}
	.parcel_check{
		font-weight:600;text0align:center;
	}
	.text-center{text-align:center;}
	@media(max-width:425px){
		h1,h2,h3,h4,h5,h6{font-size:100% !important;}
	}
</style>