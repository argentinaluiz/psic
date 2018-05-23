<template>

    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1"> This is tab</a></li>
            <li class=""><a data-toggle="tab" href="#tab-2">This is second tab</a></li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="panel-body">
                    <div class="file-box">
                        <template>
                            <psych-class-toolkit-frame></psych-class-toolkit-frame>	
                        </template>
                    </div>
                </div>
            </div>
            <div id="tab-2" class="tab-pane">
                <div class="panel-body">
                    <strong>Donec quam felis</strong>

                    <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                        and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                        sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 
    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" :href="`#tab-${index}`"> {{ classToolkit.sub_sub_rank.name }}</a></li>
        </ul>
        <div class="tab-content">
            <div :id="`tab-${index}`" class="tab-pane active">
                <div class="panel-body">
                    <div class="file-box">
                        <template>
                            <psych-class-toolkit-frame></psych-class-toolkit-frame>	
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->

</template>

<script type="text/javascript">
    import store from '../../../store/store';

    export default {
         components:{
            'psych-class-toolkit-frame' : require('./PsychClassToolkitFrame.vue')
        },
        computed: {
            classToolkit(){
                return this.$deepModel('psych.classToolkit.classToolkit');
            },
        },
        mounted() {
            store.dispatch('psych/classToolkit/query');
        }
    }
</script>