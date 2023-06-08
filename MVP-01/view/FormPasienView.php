<?php


include_once("presenter/ProsesPasien.php");

class FormPasienView
{
	private $formpasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->formpasien = new FormPasien();
	}

	function add()
	{

		// Membaca template skin.html
		$this->tpl = new Template("templates/skinForm.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("IDVALUE", "");
		$this->tpl->replace("NIKVALUE", "");
		$this->tpl->replace("NAMAVALUE", "");
		$this->tpl->replace("TEMPATVALUE", "");
		$this->tpl->replace("TLVALUE", "");
		$this->tpl->replace("LISSELECTED", "");
		$this->tpl->replace("PISSELECTED", "");
		$this->tpl->replace("EMAILVALUE", "");
		$this->tpl->replace("TELPVALUE", "");
		$this->tpl->replace("BUTTON", "submit");

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function edit($id)
	{

		$this->formpasien->editData($id);

		$this->tpl = new Template("templates/skinForm.html");

		$this->tpl->replace("IDVALUE", $this->formpasien->getId(0));
		$this->tpl->replace("NIKVALUE", $this->formpasien->getNik(0));
		$this->tpl->replace("NAMAVALUE", $this->formpasien->getNama(0));
		$this->tpl->replace("TEMPATVALUE", $this->formpasien->getTempat(0));
		$this->tpl->replace("TLVALUE", $this->formpasien->getTl(0));

		if ($this->formpasien->getGender(0) == "Laki-laki") {
			$this->tpl->replace("LISSELECTED", "selected");
			$this->tpl->replace("PISSELECTED", "");
		} else {
			$this->tpl->replace("LISSELECTED", "");
			$this->tpl->replace("PISSELECTED", "selected");
		}
		$this->tpl->replace("EMAILVALUE", $this->formpasien->getEmail(0));
		$this->tpl->replace("TELPVALUE", $this->formpasien->getTelp(0));
		$this->tpl->replace("BUTTON", "update");
		$this->tpl->write();
	}
}
