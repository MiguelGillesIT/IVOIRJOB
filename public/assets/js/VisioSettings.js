const domain = 'meet.jit.si';
const options = {
    roomName: 'JitsiMeetAPINEWMIGUEL',
    width: 1000,
    height: 590,
    parentNode: document.querySelector('#contentVisio')
};
const api = new JitsiMeetExternalAPI(domain, options);