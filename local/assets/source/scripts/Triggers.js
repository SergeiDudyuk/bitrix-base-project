import $ from 'jquery'

class Triggers {
  init () {
    $(document).ready(() => {
      this.toggleSelf()
    })
  }

  toggleSelf () {
    $('body').on('click', '.js-toggle-self', (event) => {
      let target = $(event.currentTarget)
      if (!target.hasClass('open')) {
        target.addClass('open')
      } else {
        target.removeClass('open')
      }
    })
  }
}

export let triggers = new Triggers()
