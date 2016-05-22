<?php

class MensagemController
{
	public static function msg001()
	{
		return "Usuário criado com sucesso";
	}
	
	public static function msg002()
	{
		return "Criação de usuário falhou";
	}
	
	public static function msg003($codigo)
	{
		return "Este código ({$codigo}) já existe";
	}
	
	public static function msg004($codigo)
	{
		return "Este código ({$codigo}) não existe";
	}
	
	public static function msg005()
	{
		return "Usuário alterado com sucesso";
	}
	
	public static function msg006()
	{
		return "Alteração de usuário falhou";
	}
	
	public static function msg007($data, $hora)
	{
		return "Já existe um agendamento com os respectivos horários ({$data} - {$hora})";
	}
	
	public static function msg008()
	{
		return "Criação de agendamento falhou";
	}
	
	public static function msg009($id)
	{
		return "Agendamento criado com sucesso. <br>Anote o número do agendamento: <strong>{$id}</strong>";
	}
	
	public static function msg010($codigo)
	{
		return "O Paciente de Código ({$codigo}) não existe";
	}
	
	public static function msg011()
	{
		return "Este agendamento não existe";
	}
	
	public static function msg012($crm)
	{
		return "Este CRM ({$crm}) já existe";
	}
	
	public static function msg013()
	{
		return "Médico criado com sucesso";
	}
	
	public static function msg014()
	{
		return "Criação de médico falhou";
	}
}