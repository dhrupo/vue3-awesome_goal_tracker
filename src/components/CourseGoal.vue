<template>
  <GoalList @deleteGoal="deleteGoal" :goals="filteredGoals"></GoalList>
  <AddGoal @add-goal="addGoal"></AddGoal>
</template>

<script>
import { ref, computed } from "vue";

import GoalList from "./GoalList.vue";
import AddGoal from "./AddGoal.vue";
export default {
  name: "CourseGoal",
  components: {
    GoalList,
    AddGoal,
  },
  setup() {
    const goals = ref([]);

    const filteredGoals = computed(function () {
      return goals.value.filter(
        (goal) => !goal.text.includes("react") && !goal.text.includes("angular")
      );
    });

    function addGoal(text) {
      const newGoal = {
        id: new Date().toISOString(),
        text: text,
      };
      goals.value.push(newGoal);
    }

    function deleteGoal(id) {
      goals.value = goals.value.filter((goal) => goal.id != id);
    }

    return {
      filteredGoals: filteredGoals,
      addGoal: addGoal,
      deleteGoal: deleteGoal,
    };
  },
};
</script>

<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
</style>