<?php
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_User
 * @version 		$Id: browse.html.php 2137 2010-11-15 13:37:06Z Raymond_Benc $
 * {* *}
 */
defined('PHPFOX') or exit('NO DICE!');
?>

<div class="message">
	<ol>
		<li>
			If your site uses multiple languages you can <a href="{url link='admincp.language.phrase.add' last-module='user'}">create a language phrase here</a>, and use it when adding the question or answers.
		</li>
		<li>
			All answers are compared exactly ("Answer" is not the same as "answer").
		</li>
	</ol>
</div>

<form action="{url link='admincp.user.spam'}" method="post" enctype="multipart/form-data">
	<div class="table_header">
		Add New Question
	</div>
	<div class="table">
		<div class="table_left">
			You can add an image if you like:
		</div>
		<div class="table_right">
			<input type="file" name="file" id="input_file" onchange="$Core.User.Spam.fileChanged();">
			{* We can hide this when adding a new question *}
			<div id="div_edit_image">
				<div id="div_edit_image_imge"></div>
				<input type="hidden" name="val[preserve_image]" value="1">
				<input type="button" class="button" id="btn_edit_remove_image" value="Delete Image" onclick="$Core.User.Spam.deleteImage();">
			</div>
		</div>
	</div>
	<div class="table">
		<div class="table_left">
			You can add your question here:
		</div>
		<div class="table_right">
			<input type="text" name="val[question]" id="question_text">
			<div class="extra_info">
				You can enter the HTML code for a language phrase, for example: <br />{l}phrase var='core.yes'{r}
			</div>
		</div>
	</div>
	<div class="table" id="div_add_answers">
		<div class="table_left">
			Now add at least one valid answer:
		</div>
		<div class="table_right">
			
			<div id="div_add_answer">
				<input type="button" value="Add more answers" class="button" onclick="$Core.User.Spam.addAnswer();">
			</div>
			<div class="extra_info">
				You can use HTML code for language phrases, for example: <br />{l}phrase var='core.yes'{r}
			</div>
		</div>
	</div>
	{*
		<div class="table">
			<div class="table_left">
				Case sensitive?
			</div>
			<div class="table_right">
				<input type="radio" value="1" checked="checked" id="radio_answers_case_yes" name="val[case]"> <label for="radio_answers_case_yes">Yes</label><br />
				<input type="radio" value="0" id="radio_answers_case_no" name="val[case]"> <label for="radio_answers_case_no">No</label>
			</div>
		</div>
	*}
	<div class="table_bottom">
		<input type="submit" value="Add Question" id="btn_submit" class="button">
	</div>
</form>

<div class="table_header">
	Current Questions
</div>
<table id="tbl_questions">
	<tr class="tbl_questions_header">
		<th></th>
		<th>Image</th>
		<th>Question</th>
		<th>Answers</th>
		{* <th>Case Sensitive</th> *}
	</tr>
	<tr id="tpl_question_tr">
		<td class="question_actions">
			{img theme='misc/delete.png' class='img_delete_question' onclick='$Core.User.Spam.deleteQuestion( $(this).data('question_id').question_id );'}
			<a href="{url link='admincp.user.spam'}" class="a_edit">Edit</a>
		</td>
		<td class="question_image">
		</td>
		<td class="question_question">
			
		</td>
		<td class="question_answers">
			
		</td>
		{*
			<td class="question_case">
		
			</td>
		*}
	</tr>
</table>







<div id="tpl_answer">
	<div class="valid_answer">
		<div class="valid_answer_action">
			{img theme='misc/delete.png' class='img_delete' onclick='$Core.User.Spam.deleteAnswer(this);'}
		</div>
		<div class="valid_answer_text">
			<input type="text" name="val[answer][]">
		</div>
	</div>
</div>