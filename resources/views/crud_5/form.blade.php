@if(isset($customer))
    {!! Form::model($customer,['method'=>'put','id'=>'frm']) !!}
@else
    {!! Form::open(['id'=>'frm']) !!}
@endif
<div class="modal-header">
    <h5 class="modal-title">{{isset($customer)?'Edit':'New'}} Customer</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group row required">
        {!! Form::label("name","Name",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("name",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),'placeholder'=>'Name','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label("gender","Gender",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::select("gender",['Male'=>'Male','Female'=>'Female'],null,["class"=>"form-control"]) !!}
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("email","Email",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),'placeholder'=>'Email']) !!}
            <span id="error-email" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
            {!! Form::label("use_url","Use Url?",["class"=>"col-form-label col-md-3"]) !!}
            <div class="col-md-9">
                {!! Form::checkbox("active", 1, true, ["class" => "form-control", "id" => "active"]) !!}
                <span id="error-email" class="invalid-feedback"></span>
            </div>
    </div>



    <div id="active_sub">
        <p>Verbage and stuff... </p>
    </div>


    
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
    {!! Form::submit("Save",["class"=>"btn btn-primary"])!!}
</div>
{!! Form::close() !!}


<script type="text/javascript">
    // to remove fn's from global namespace
    (function() {
        
        // for toggle related demo
        function toggleSub(box, id) {
            // get reference to related content to display/hide
            var el = document.getElementById(id);
            
            if ( box.checked ) {
                el.style.display = 'block';
            } else {
                el.style.display = 'none';
            }
        }
        
        var active = document.getElementById('active');
        active.checked = false; // for soft reload
        
        // attach function that calls toggleSub to onclick property of checkbox
        // toggleSub args: checkbox clicked on (this), id of element to show/hide
        active.onclick = function() { toggleSub(this, 'active_sub'); };
        
        
        // disable submission of all forms on this page
        for (var i=0, len=document.forms.length; i<len; i++) {
            document.forms[i].onsubmit = function() { return false; };
        }
    
    }());
    </script>