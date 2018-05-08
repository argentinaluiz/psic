import classInformation from './psych/class_information';
import classMeeting from './psych/class_meeting';
import classTest from './psych/class_test';
import research from './psych/research';

const module = {
    namespaced: true,
    modules: {
        classInformation, classMeeting, classTest, research
    }
}

export default module;