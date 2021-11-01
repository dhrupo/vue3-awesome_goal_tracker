<template>
  <el-container>
    <el-header> <h2>My Goals</h2> </el-header>
    <el-main>
      <ul>
        <li v-for="goal in goals" :key="goal.id">
          {{ goal.text }}
          <el-button
            type="danger"
            icon="el-icon-delete"
            circle
            @click="$emit('deleteGoal', goal.id)"
          ></el-button>
        </li>
      </ul>
    </el-main>
  </el-container>
</template>

<script>
export default {
  name: "GoalList",
  emits: "deleteGoal",
  props: {
    goals: Array,
  },
};
</script>

<style scoped>
ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
li {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 1rem 0;
  border: 1px solid #ccc;
  padding: 5px;
}
</style>