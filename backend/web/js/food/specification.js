$(function () {
    const callout = new CallOut('#callOut');
    if (message && message != '') {
        callout.success(message);
    }
});