import classInformation from './psych/class_information';
import classMeeting from './psych/class_meeting';
import classTest from './psych/class_test';
import classToolkit from './psych/class_toolkit';
import research from './psych/research';
import classSet from './psych/class_set';
import tool from './psych/tool';

const module = {
    namespaced: true,
    modules: {
        classInformation, classMeeting, classTest, tool, classToolkit, research, classSet
    }
}

export default module;