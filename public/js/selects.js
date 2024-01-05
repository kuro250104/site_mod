function updateStageOptions() {
    var projectOneSelect = document.getElementById('project_one');
    var stageOneSelect = document.getElementById('stage_one');

    if (!projectOneSelect) {
        console.error("Element with id 'project_one' not found.");
        return;
    }

    var stageOptions = JSON.parse(projectOneSelect.getAttribute('stage_one'));

    var selectedProject = projectOneSelect.value;

    console.log('Selected Project:', selectedProject);
    console.log('Stage Options:', stageOptions[selectedProject]);

    stageOneSelect.innerHTML = '<option value="">Choisissez un stade</option>';

    if (Array.isArray(stageOptions[selectedProject])) {
        stageOptions[selectedProject].forEach(function (stage) {
            var option = document.createElement('option');
            option.value = stage.id;
            option.text = stage.name !== null ? stage.name: ""; // Assurez-vous que stage.name n'est pas null
            stageOneSelect.add(option);
        });
    }


}
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('project_one').addEventListener('change', updateStageOptions);

    updateStageOptions();
});




