        <!-- Date + time inputs -->
        <div class="form-row">
            <div class="form-group col-md-6">
                {{ Form::label('date') }}
                {{ Form::date('date', $incident->occurred_at, [
                    'class' => 'form-control'
                ]) }}
                @error('occurred_at')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('time') }}
                {{ Form::time('time', $incident->occurred_at, [
                    'class' => 'form-control'
                ]) }}
            </div>
        </div>

        <!-- Type select -->
        <div class="form-group">
            {{ Form::label('types[]', 'Incident Type') }}
            {{ Form::select('types[]', $types, $incident->types, [
                'class' => 'custom-select',
                'multiple' => 'multiple'
            ]) }}
            <p class="form-text text-muted">Please select all that apply. To select multiple, hold down the <kbd>Ctrl</kbd> key.</p>
            @error('type')
            <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submitter name -->
        <div class="form-group">
            {{ Form::label('submitted_by') }}
            {{ Form::text('submitted_by', NULL, [
                'class' => 'form-control'
            ]) }}
            @error('submitted_by')
            <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <!-- Involved parties -->
        <div class="form-group">
            {{ Form::label('people[]', 'Individuals Involved') }}
            {{ Form::select('people[]', $people, $incident->people, [
                'class' => 'custom-select',
                'multiple' => 'multiple'
            ]) }}
            @error('people')
            <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <!-- Location input -->
<?php
$locations = explode(',', env('APP_LOCATIONS'));
$location_array = array_combine($locations, $locations);
?>
        <div class="form-group">
            {{ Form::label('location') }}
            {{ Form::select('location', $location_array, NULL, [
                'class' => 'custom-select'
            ]) }}
            @error('location')
            <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description input -->
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::textarea('description', NULL, [
                'class' => 'form-control'
            ]) }}
            @error('description')
            <p class="form-text text-danger">{{ $message }}</p>
            @enderror
            <p class="form-text text-muted">Please be as detailed as possible.</p>
        </div>

        <!-- Law enforcement officer checkbox -->
        <div class="form-group form-check">
            {{ Form::checkbox('leo', 1, NULL, [
                'class' => 'form-check-input',
                'id' => 'leo'
            ]) }}
            {{ Form::label('leo', 'Were police involved?', [
                'class' => 'form-check-label ml-1'
            ]) }}
        </div>


        <!-- Witness name input -->
        <div class="form-group">
            {{ Form::label('witnessed_by', 'Witnesses') }}
            {{ Form::text('witnessed_by', NULL, [
                'class' => 'form-control'
            ]) }}
            <p class="form-text text-muted">Was anyone else present? Please include contact information, where available.</p>
        </div>

        <script type="text/javascript">
            $(document).ready(function(e){
                $('.custom-select').select2({
                    theme: 'bootstrap4'
                });
            });
        </script>