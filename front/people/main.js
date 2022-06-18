import {sred_ball} from './full_profile.php';

var circleBar = new ProgressBar.Circle('#circle-container', {
    color: 'white',
    strokeWidth: 2,
    trailWidth: 10,
    trailColor: 'black',
    easing: 'easeInOut'
});

circleBar.animate(0.35, {
    duration: 1500
});

