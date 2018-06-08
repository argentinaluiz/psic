import {Psychoanalyst} from '../../services/resources';

function newChoice(){
    return{
        choice:'',
        'true': false
    };
}


function newQuestion(){
    return{
        question: '',
        point:1,
        choices:[
            newChoice(),
            newChoice(),
            newChoice(),
            newChoice(),
        ]
    };
}


const state = {
    classTests: [],
    classTest: {
        name: '',
        date_start: '',
        date_end: '',
        selected:1,
        question_type: [
            {value: "1", text:"Uma escolha"},
            {value: "2", text:"Várias escolhas"},
            {value: "3", text:"Discursiva"}
        ],
        questions:[]
    },
    question: newQuestion(),
    choiceTrue: null
};

const mutations = {
    setClassTest(state,classTest){
        state.classTest = classTest;
    },
    setClassTests(state,classTests){
        state.classTests = classTests;
    },
    deleteClassTest(state,classTestId){
        let index = state.classTests.findIndex((item) => {
            return item.id == classTestId;
        });
        if(index!=-1){
            state.classTests.splice(index,1);
        }
    },
    setName(state,name){
        state.classTest.name = name;
    },
    addQuestion(state){
        if(typeof state.question.id =="undefined"){
            state.classTest.questions.push(state.question);
        }
        state.question = newQuestion();
        state.choiceTrue = null;
    },
    setQuestion(state,question){
        question.choices = question.choices.map((item)=>{
            item.true = item.true?'true':false;
            if(item.true){
                state.choiceTrue = item;
            }
            return item;
        }); 
        state.question = question;
    },
    deleteQuestion(state,index){
        state.classTest.questions.splice(index,1);
    },
    addChoice(state){
        state.question.choices.push(newChoice());
    },
    deleteChoice(state,index){
        state.question.choices.splice(index,1);
    },
    setChoiceTrue(state,choice){
        if(state.choiceTrue){
            state.choiceTrue.true = false;
        }
        state.choiceTrue = choice;
    }
};

const actions = {
    query(context,classMeetingId){
        return Psychoanalyst.classTest.query({class_meeting: classMeetingId})
            .then(response => {
                context.commit('setClassTests',response.data);
            });
    },
    get(context, {classMeetingId,classTestId}){
        return Psychoanalyst.classTest.get({class_meeting: classMeetingId, class_test: classTestId})
            .then(response => {
                context.commit('setClassTest',response.data);
            })
    },
    create(context,classMeetingId){
        return Psychoanalyst.classTest.save({class_meeting:classMeetingId},context.state.classTest);
    },
    update(context,{classMeetingId, classTestId}){
        return Psychoanalyst.classTest.update({
            class_meeting:classMeetingId, class_test:classTestId
        },context.state.classTest);
    },
    'delete'(context,{classMeetingId, classTestId}){
        return Psychoanalyst.classTest.delete({
            class_meeting:classMeetingId, class_test:classTestId
        }).then(() => {
            context.commit('deleteClassTest', classTestId);
        });
    }
};

export default {
    namespaced: true,
    state, mutations,actions
}