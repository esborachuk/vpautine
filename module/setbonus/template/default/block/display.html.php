<?php
/*
 * 
 */
?>

<div class="sb-actions">
    {if $statusplus == FALSE}Вы не являетесь участником SET+{/if}
    {if $statusplus == TRUE}Вы являетесь участником SET+{/if}

    {if $cusc < 50 }
        <a class="button yellow" href="#"><span>Пополнить счет</span></a>
        <p class="sets-few">На вашем счету недостаточно средств. У вас {$cusc} SET-ов.</p>
    {elseif $statusplus == FALSE && $cusc >=50}
        <a class="button yellow" href="#"><span>Пополнить счет</span></a>
        <a class="button green" href="#"><span>Перейти в "Статус + "</span></a>
        <p class="sets-ok">На вашем счету {$cusc} SET-ов, но вы не используете Статус+.</p>
    {elseif $statusplus == TRUE}
        <a class="button yellow" href="#"><span>Пополнить счет</span></a>
        <p class="sets-ok">На вашем счету {$cusc} SET-ов, Статус+ активирован до {$date_end}</p>
    {/if}
</div>
<div class="clear"></div>
<div class="sb-info togglable">
    <p><b>Программа «SET + »</b> – это система поощрения пользователей, которые имеют «Статус + » за рекомендацию получить «Статус + » пользователей социальной сети pautina.me</p>
    <p><b>«Статус + »</b> позволит Вам редактировать дизайн сайта по Вашему вкусу, а также стать участником Программы «SET + »</p>
    <p>Участие в Программе «SET + » позволит Вам зарабатывать, совершая привычные действия!</p>
    <p>Пополнение баланса производится в любой удобный для Вас способ. <a href="#">Правила пополнения баланса. Пополнить баланс</a></p>
    <p>«Статус + Партнер» – это пользователь, который получил Статус + по Вашей рекомендации (подтвердил это, вписав в графу «ID рекомендатора» ваш ID)</p>
    <p>Все пользователи «Статус +», которых рекомендуют Ваши партнеры, автоматически становятся Вашими «Статус + Партнерами» по нижеприведенной схеме:</p>
    <p>Начисление проводится до 21-го уровня рекомендованных пользователей со «Статус + » - включительно</p>
    <table border="2" cellspacing="3" style="float: left; border:1px solid #aaa; margin: 5px; background-color: #eee;">
        <thead>
            <tr style="background-color: #ccc; font-weight: bold;">
                <th>Уровень "дерева"</th>
                <th>Вознаграждение SET</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <td>2</td>
                <td>1</td>
            </tr>
            <tr>
                <td>3</td>
                <td>1</td>
            </tr>
            <tr>
                <td>4</td>
                <td>1</td>
            </tr>
            <tr>
                <td>5</td>
                <td>1</td>
            </tr>
            <tr>
                <td>6</td>
                <td>1</td>
            </tr>
            <tr>
                <td>7</td>
                <td>1</td>
            </tr>
            <tr>
                <td>8</td>
                <td>1</td>
            </tr>
            <tr>
                <td>9</td>
                <td>1</td>
            </tr>
            <tr>
                <td>10</td>
                <td>1</td>
            </tr>
            <tr>
                <td>11</td>
                <td>1</td>
            </tr>
            <tr>
                <td>12</td>
                <td>1</td>
            </tr>
            <tr>
                <td>13</td>
                <td>1</td>
            </tr>
            <tr>
                <td>14</td>
                <td>1</td>
            </tr>
            <tr>
                <td>15</td>
                <td>1</td>
            </tr>
            <tr>
                <td>16</td>
                <td>1</td>
            </tr>
            <tr>
                <td>17</td>
                <td>1</td>
            </tr>
            <tr>
                <td>18</td>
                <td>1</td>
            </tr>
            <tr>
                <td>19</td>
                <td>1</td>
            </tr>
            <tr>
                <td>20</td>
                <td>1</td>
            </tr>
            <tr>
                <td>21</td>
                <td>1</td>
            </tr>
        </tbody>
    </table>

    <p>
        <img src="./module/setbonus/static/image/tbl.jpg" style="float: left;">
    <p style="margin: 25px;">4 194 302 SET-ов - это Ваш суммарный доход при условии рекомендации 2-х пользователей сети  на перевод в «Статус + » до 21 уровня и дублирования Вас вашими партнерами до 21-го уровня.</p>
</p>
<div class="clear"></div>
<p>Баланс Вашего счета выводится в верхнем меню, а также в "Кабинете" пользователя.</p>
<p>Выведение Вашего вознаграждения производится после подачи заявки установленной формы.</p>
<p>Срок действия «Статус + » – 6 месяцев!</p>
<p>Стоимость продления «Статус + » – 50 SETов</p>
<p>В любой момент пользователь может поменять статус «Статус + » на базовый статус, при этом ему возмещается стоимость «Статус + ».</p>
<p>Администрация сайта оставляет за собой право аннулировать «Статус + » при нарушениях пользоватлем правил сайта.</p>
</div>

<br/>
<br/>
DEBUG::
CURRENT_USER_ID={$cuid};
CURRENT_SETS_COUNT={$cusc};