<template>
  <section class="container">
    <form @submit.prevent="addGoal">
      <div>
        <input
          type="text"
          id="goaltext"
          v-model="enteredText"
          placeholder="type to add goal..."
        />
        <el-button @click="addGoal" type="success">Add Goal</el-button>
      </div>
      <p v-if="invalidInput">Please enter a valid goal text (non-empty).</p>
    </form>
  </section>
</template>

<script>
import { ref, watch } from "vue";
export default {
  name: "AddGoal",
  setup(props, context) {
    const enteredText = ref("");
    const invalidInput = ref(false);

    watch(invalidInput, function (val) {
      if (val) {
        console.log("Analytics: Invalid Input");
      }
    });

    function addGoal() {
      invalidInput.value = false;
      if (enteredText.value === "") {
        invalidInput.value = true;
        return;
      }
      context.emit("add-goal", enteredText.value);
      enteredText.value = "";
    }

    return {
      enteredText,
      invalidInput,
      addGoal,
    };
  },
};
</script>

<style scoped>
form {
  text-align: center;
}
label {
  display: block;
  font-weight: bold;
  margin-bottom: 0.5rem;
}
input {
  font: inherit;
  display: block;
  width: 100%;
  margin-bottom: 0.5rem;
}
</style>
