@if (session('message'))
<div class="position-absolute" style="top:0;right:0;">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
        <div class="toast-header">
            <strong class="mr-auto">Notice</strong>
        </div>
        <div class="toast-body">
            {{ session('message') }}
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(e){
        $('.toast').toast('show');
    });
</script>
@endif