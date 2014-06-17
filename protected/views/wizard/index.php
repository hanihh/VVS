<?php $this->pageTitle=Yii::app()->name; ?>

<p style="font-size:120%;font-weight: bold;">Welcome to the <i><?php echo CHtml::encode(Yii::app()->name); ?> Demo</i></p>

<p>Wizard Behavior is an extension for the Yii PHP Framework that simplifies the handling of multi-step forms. It features data persistence, Plot-Branching Navigation (PBN), Next/Previous or Forward Only navigation, optional step timeout, invalid step handling, save and recover wizards between sessions, and has utility methods for use in views to assist navigation; the demos below demonstrate these features.</p>

<div id="demos">
<h2>The Demos</h2>
<ul>
<li><a href="/program">Registration Wizard&nbsp;&raquo;</a><p>A Four step registration wizard.</p><p>You can return to previous steps either using the "Previous" button or the menu; note that $autoAdvance===TRUE, so if you go back two steps the "Next" button goes to the first uncompleted step.</p><p>You can save your registration by clicking the Save button, and then resume it later by going to the provided URL.</p></li>
<li><a href="/demo/quiz">Quiz Wizard&nbsp;&raquo;</a><p>10 General knowledge questions, but you need to be quick with your answers.</p><p>This demonstrates the step timeout feature (you have 30 seconds to answer each question), and ForwardOnly navigation - you can not return to an earlier step even by manually entering the URL</p></li>
<li><a href="/demo/survey">Survey Wizard&nbsp;&raquo;</a><p>A short survey about your pets that demonstrates the Plot-Branching Navigation (PBN) feature of the Wizard Behavior.</p><p>PBN allows the wizard to present different forms depending on the results of previous steps; an "if this then that" mechanism.</p><p>Give different answers to see what happens.</p></li>
</ul>
<p><b>Note:</b> No data is stored on completion of the Wizard's; they either display what you have eneterd, or in the case of the quiz, how well you did.</p>
</div>

<p><a href="http://www.yiiframework.com/extension/wizard-behaviour/">Download The Wizard Behavior and/or the code for this demo</a></p>
<p><a href="/documents/wizard_behavior_manual.pdf">The Wizard Behavior manual (PDF - 1.5MB)</a></p>
<p><a href="http://www.yiiframework.com/forum/index.php?/topic/16471-wizard-behavior/">Comments, suggestions, &amp; bug reports</a></p>
