(()=>{"use strict";var e={744:(e,r)=>{r.Z=(e,r)=>{const t=e.__vccOpts||e;for(const[e,o]of r)t[e]=o;return t}}},r={};function t(o){var n=r[o];if(void 0!==n)return n.exports;var a=r[o]={exports:{}};return e[o](a,a.exports,t),a.exports}(()=>{const e=Vue;var r={key:0,class:"font-normal text-xl"},o={key:1},n={key:2},a=["href"],c={key:3,class:"font-medium text-lg"};const i={props:["card"]};const l=(0,t(744).Z)(i,[["render",function(t,i,l,s,d,p){var m=(0,e.resolveComponent)("Card",!0);return(0,e.openBlock)(),(0,e.createBlock)(m,{class:"flex flex-col gap-2 items-center justify-center"},{default:(0,e.withCtx)((function(){return[l.card.heading?((0,e.openBlock)(),(0,e.createElementBlock)("h1",r,(0,e.toDisplayString)(l.card.heading),1)):(0,e.createCommentVNode)("",!0),l.card.current?((0,e.openBlock)(),(0,e.createElementBlock)("div",o,(0,e.toDisplayString)(t.__("Laravel Nova :version available",{version:l.card.current})),1)):(0,e.createCommentVNode)("",!0),l.card.link?((0,e.openBlock)(),(0,e.createElementBlock)("div",n,[(0,e.createElementVNode)("a",{href:l.card.link,target:"card",rel:"noopener",class:"border inline-flex items-center justify-center appearance-none cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 relative disabled:cursor-not-allowed shadow h-9 px-3 bg-primary-500 border-primary-500 hover:enabled:bg-primary-400 hover:enabled:border-primary-400 text-white dark:text-gray-900"},(0,e.toDisplayString)(t.__("Compare versions")),9,a)])):(0,e.createCommentVNode)("",!0),l.card.link?(0,e.createCommentVNode)("",!0):((0,e.openBlock)(),(0,e.createElementBlock)("div",c,(0,e.toDisplayString)(t.__("Laravel Nova is up to date")),1))]})),_:1})}]]);Nova.booting((function(e,r){e.component("nova-watch-card",l)}))})()})();