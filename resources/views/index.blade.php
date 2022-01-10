
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>NadeSoft Task</title>
    <link   href="{{asset('assets/css/style.css')}}"  rel="stylesheet" type="text/css" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script>
      $(document).ready(function(){
        $('#demoform input[type="text"]').blur(function(){
          if(!$(this).val()){
            $(this).addClass("error");
          } else{
            $(this).removeClass("error");
          }
        });
      });

    </script>

    
</head>
<body>
<style>

    .error{
    color:red;
            /* outline: 1px solid red; */
        }

.makeRed{

border-bottom: 1px solid red !important;

}
    </style>

<!-- <div class="row pt-5 ">
        <div class="col-lg-6">
            <div class="logo"></div>
        </div>
        <div class="col-lg-6">
            <img src="{{asset('assets/images/Group 1813.svg')}}" alt="" class="side pull-right">
        </div>
    </div> -->

    <!-- right Image -->
    <div class="col-lg " >
            <img src="{{asset('assets/images/Group 1813.svg')}}" alt="" class="side pull-right">
        </div>

<div class="container">
<div class="col-lg pt-5 pb-5">
            <div class="logo"></div>
        </div>
     <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
    <!-- <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center ml-5 mt-5">Nadosft -Customer Support Form</h2>
        </div>
    </div> -->

    <div class="row">
    <div class="col-lg-12">
            <h2 class="text-center ml-5 mt-5">Nadosft -Customer Support Form</h2>
        </div>
        <div class="col-lg-12" id="topbar">
            <div class=" center-image"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center please pt-5">Please fill the form below:</h2>
        </div>
    </div>
    <div id="top2" style="display: none">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> Sending ... </strong> please wait.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div id="top" style="display: none">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Thank you, </strong>your details have been successfully registered.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <form action="{{ route('form.data') }}" name="demoform" id="demoform" method="POST" class="dropzone row pt-5" enctype="multipart/form-data">
        @csrf
        
        <div class="col-lg-3">
            <label for="firstName" class="text-bold label-new" id="fname-label">Reporter Name <span class="text-success">*</span></label>
            <input type="text" class="form-control h-150 {{ $errors->has('fname') ? 'error' : '' }} " id="fname" name="fname" placeholder="First name" value="{{ old('fname') }}"  >
           
            <!-- Error -->
        @if ($errors->has('fname'))
        <div class="error">
            {{ $errors->first('fname') }}
        </div>
        @endif
        </div>
        <div class="col-lg-3">
            <label for="lastName" class="text-bold label-new opacity-"  id="lname-label">Last Name</label>
            <input type="text" class="form-control h-150 {{ $errors->has('lname') ? 'error' : '' }}" id="lname" name="lname" placeholder="Last name" value="{{ old('lname') }}">
            <span class="text-danger" id="lname-error"></span>
            
            <!-- Error -->
            @if ($errors->has('lname'))
        <div class="error">
            {{ $errors->first('lname') }}
        </div>
        @endif
        </div>


        <div class="col-lg-6 ">
            <label for="email" class="text-bold label-new">Email <span class="text-success">*</span></label>
            <input type="text" class="form-control h-150  {{ $errors->has('email') ? 'error' : '' }}" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
            <span class="text-danger" id="email-error"></span>
            <!-- Error -->
            @if ($errors->has('email'))
        <div class="error">
            {{ $errors->first('email') }}
        </div>
        @endif
        </div>

        <div class="col-lg-6 pt-4">
            <label for="phone" class="text-bold label-new">Phone Number <span class="text-success">*</span></label>
            <input type="text" class="form-control h-150  {{ $errors->has('phone') ? 'error' : '' }}" id="phone" name="phone" placeholder="Please fill your mobile number for contact" value="{{ old('phone') }}">
            <span class="text-danger" id="phone-error"></span>
             <!-- Error -->
             @if ($errors->has('phone'))
        <div class="error">
            {{ $errors->first('phone') }}
        </div>
        @endif
        </div>
        <div class="col-lg-6 pt-4">
            <label for="project" class="text-bold label-new">Project <span class="text-success">*</span></label>
            <input type="text" class="form-control h-150  {{ $errors->has('project') ? 'error' : '' }}" id="project" name="project" placeholder="Enter the title of your project and domain name (if there is)" value="{{ old('project') }}">
            <span class="text-danger" id="project-error"></span>
             <!-- Error -->
             @if ($errors->has('project'))
        <div class="error">
            {{ $errors->first('project') }}
        </div>
        @endif
        </div>
        <div class="col-lg-12 pt-4">
            <label for="email" class="text-bold label-new">Classification <span class="text-success">*</span></label>
        </div>
        <div class="col-lg-6 radio">
            <div class="form-control h-150">
                <label class="pl-5 pt-2"> Bug Fix
                    <input type="radio" name="classification" value="Bug Fix">
                    <span class="checkmark"></span>
                </label>

            </div>

        </div>
        <div class="col-lg-6 radio">
            <div class="form-control h-150">
                <label class="pl-5 pt-2"> New Requirement
                    <input type="radio" name="classification" value="New Requirement">
                    <span class="checkmark"></span>
                </label>

            </div>
 
        </div>
        <div class="col-lg-12">
            <span class="text-danger" id="classification-error"></span>
            <!-- Error -->
            @if ($errors->has('classification'))
        <div class="error">
            {{ $errors->first('classification') }}
        </div>
        @endif
        </div>
        <div class="col-lg-12 pt-5">
            <label for="issue" class="text-bold label-new"> Issue Tittle  <span class="text-success">*</span></label>
            <input type="text" class="form-control h-150  {{ $errors->has('issue') ? 'error' : '' }}" id="issue" name="issue" placeholder="Fill The Summary of the issue" value="{{ old('issue') }}">
            <span class="text-danger" id="issue-error"></span>
             <!-- Error -->
             @if ($errors->has('issue'))
        <div class="error">
            {{ $errors->first('issue') }}
        </div>
        @endif
        </div>
        <div class="col-lg-12 pt-5 rel">
            <label for="description" class="text-bold label-new"> Issue Tittle  <span class="text-success">*</span></label>
            <small class="text-right load">0/200</small>
            <textarea class="form-control  {{ $errors->has('description') ? 'error' : '' }}" id="description" rows="5" name="description" placeholder="Describe in details your issue" value="{{ old('description') }}"></textarea>
            <span class="text-danger" id="description-error"></span>
             <!-- Error -->
             @if ($errors->has('description'))
        <div class="error">
            {{ $errors->first('description') }}
        </div>
        @endif
        </div>
        <div class="col-lg-12 pt-4">
            <label for="email" class="text-bold label-new">Priority <span class="text-success">*</span></label>
            <h6 >The emergency level</h6>
        </div>
        <div class="col-lg-4 radio">
            <div class="form-control h-150 ">
                <label class="pl-5 pt-2"> Low
                    <input type="radio" name="priority" value="Low" >

                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-4 radio">
            <div class="form-control h-150">
                <label class="pl-5 pt-2"> Medium
                    <input type="radio" name="priority" value="Medium">
                    <span class="checkmark"></span>
                </label>
            </div>

        </div>
        <div class="col-lg-4 radio">
            <div class="form-control h-150">
                <label class="pl-5 pt-2"> High
                    <input type="radio" name="priority" value="High">
                    <span class="checkmark"></span>
                </label>
            </div>
 
        </div>
        <div class="col-lg-12">
            <span class="text-danger" id="priority-error"></span>
            <!-- Error -->
        @if ($errors->has('priority'))
        <div class="error">
            {{ $errors->first('priority') }}
        </div>
        @endif
        </div>

        <!-- add multi-Image -->
        <div class="col-lg-12 pt-4">
            <label for="image" class="text-bold label-new">Add ScreenShots <span class="text-success">*</span></label>
        </div>
       
        <div class="col-lg-12">
            <div class='imgbox'>
            <input type="file" name="images[]" multiple  id="image" class="form-control {{ $errors->has('images') ? 'error' : '' }}" accept="image/*" style="display: none;"  onchange="loadFile(event)">
          <label  for='image'>  <i  class="fa fa-upload fa-2x icons" aria-hidden="true" id="icon"></i></label><br>
                <span class="textscreen">Drag & Drop Your File Here</span>
                </div>
                <!-- display images -->
                <p><img id="output" name="output" width="100"  /></p>

            <!-- Error -->
            @if ($errors->has('images'))
        <div class="error">
            {{ $errors->first('images') }}
        </div>
        @endif
        </div>

            <!-- /add multi-Image -->

        <!-- submit -->
        <div class="col-lg-12  text-center">
            <div class="form-group text-center">
                <button   class="pl-5 pr-5 pt-2 pb-2 rounded-pill  bg text-white " type="submit" id="submit"><B>Submit</B></button>
            </div>
        </div>
    </form>


</div>
    <!-- footer -->
<div class="row ml-0">
    <div class=" footer  col-lg-12  pt-4">
        <span>
            <span class=" text-white center">All Rights Reserved - Nadsoft © 2021</span>
            
        </span>
    </div>
</div>

<script>
    //upload multiple image eith preview
var loadFile = function(event) {
	var image= document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
//  Check if the input is empty with jQuery

//
// var imgUpload = document.getElementById('image')
//   , imgPreview = document.getElementById('output')
//   , imgUploadForm = document.getElementById('img-upload-form')
//   , totalFiles
//   , previewTitle
//   , previewTitleText
//   , img;

// function previewImgs(event) {
//   totalFiles = imgUpload.files.length;
  
//   if(!!totalFiles) {
//     imgPreview.classList.remove('quote-imgs-thumbs--hidden');
//     previewTitle = document.createElement('p');
//     previewTitle.style.fontWeight = 'bold';
//     previewTitleText = document.createTextNode(totalFiles + ' Total Images Selected');
//     previewTitle.appendChild(previewTitleText);
//     imgPreview.appendChild(previewTitle);
//   }
  
//   for(var i = 0; i < totalFiles; i++) {
//     img = document.createElement('img');
//     img.src = URL.createObjectURL(event.target.files[i]);
//     img.classList.add('img-preview-thumb');
//     imgPreview.appendChild(img);
//   }
// }
</script>
</body>
</html>
