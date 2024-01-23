@extends('validated_hour.index')

<script>
    var projectOneSelect = document.getElementById('project_one');
    var stageOneSelect = document.getElementById('stage_one');

    var projectTwoSelect = document.getElementById('project_two');
    var stageTwoSelect = document.getElementById('stage_two');



    var stageOptions = {
        @foreach($projects as $project)
        '{{ $project->id }}': [
                @foreach($stages->where('project_id', $project->id) as $stage)
            { id: '{{ $stage->id }}', name: '{{ $stage->name }}' },
            @endforeach
        ],
        @endforeach
    };


    function updateStageOptionsOne() {
        var selectedProject = projectOneSelect.value;

        stageOneSelect.innerHTML = '<option value="">Choisissez un stade</option>';
        if (stageOptions[selectedProject]) {
            stageOptions[selectedProject].forEach(function (stage) {
                var option = document.createElement('option');
                option.value = stage.id;
                option.text = stage.name;
                stageOneSelect.add(option);
            });
        }
    }

    projectOneSelect.addEventListener('change', updateStageOptionsOne);

    function updateStageOptionsTwo() {
        var selectedProject = projectTwoSelect.value;

        stageTwoSelect.innerHTML = '<option value="">Choisissez un stade</option>';
        if (stageOptions[selectedProject]) {
            stageOptions[selectedProject].forEach(function (stage) {
                var option = document.createElement('option');
                option.value = stage.id;
                option.text = stage.name;
                stageTwoSelect.add(option);
            });
        }
    }
    projectTwoSelect.addEventListener('change', updateStageOptionsTwo);
    updateStageOptionsOne();
    updateStageOptionsTwo();

</script>
