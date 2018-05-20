import classInformation from './psych/class_information';
import classMeeting from './psych/class_meeting';
import classTest from './psych/class_test';
import research from './psych/research';
import category from './psych/category';
import classToolkit from './psych/class_toolkit';
import tool from './psych/tool';

const module = {
    namespaced: true,
    modules: {
        classInformation, classMeeting, classTest, research, category, tool, classToolkit
    }
}

export default module;