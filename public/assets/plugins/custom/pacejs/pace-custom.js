paceOptions = {
    ajax: true,
    document: true, 
    eventLag: false, 
    elements: {
        selectors: ['#kt_app_main'] 
    }
};
Pace.on('start', function() {
    console.log('Loading started');
});
Pace.on('done', function() {
    console.log('Loading done');
});