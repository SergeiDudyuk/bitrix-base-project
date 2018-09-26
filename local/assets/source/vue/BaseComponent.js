export default {
  props: [
    'initial'
  ],
  created () {

    if(this.initial === undefined) {
      return false
    }

    for (let dataName in this.$data) {

      if (!this.$data.hasOwnProperty(dataName)) {
        continue
      }

      if (this.initial[dataName] === undefined) {
        continue
      }

      this.$data[dataName] = this.initial[dataName]
    }
  },
}