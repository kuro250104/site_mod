
<script>
    var projectOneSelect = document.getElementById('project_one');
    var stageOneSelect = document.getElementById('stage_one');

    var projectTwoSelect = document.getElementById('project_two');
    var stageTwoSelect = document.getElementById('stage_two');

    var projectThreeSelect = document.getElementById('project_three');
    var stageThreeSelect = document.getElementById('stage_three');

    var projectFourSelect = document.getElementById('project_four');
    var stageFourSelect = document.getElementById('stage_four');



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

    function updateStageOptionsThree() {
        var selectedProject = projectThreeSelect.value;

        stageThreeSelect.innerHTML = '<option value="">Choisissez un stade</option>';
        if (stageOptions[selectedProject]) {
            stageOptions[selectedProject].forEach(function (stage) {
                var option = document.createElement('option');
                option.value = stage.id;
                option.text = stage.name;
                stageThreeSelect.add(option);
            });
        }
    }
    projectThreeSelect.addEventListener('change', updateStageOptionsThree);

    function updateStageOptionsFour() {
        var selectedProject = projectFourSelect.value;

        stageFourSelect.innerHTML = '<option value="">Choisissez un stade</option>';
        if (stageOptions[selectedProject]) {
            stageOptions[selectedProject].forEach(function (stage) {
                var option = document.createElement('option');
                option.value = stage.id;
                option.text = stage.name;
                stageFourSelect.add(option);
            });
        }
    }
    projectFourSelect.addEventListener('change', updateStageOptionsFour);

    updateStageOptionsOne();
    updateStageOptionsTwo();
    updateStageOptionsThree();
    updateStageOptionsFour();

</script>
