<?php

namespace App\Repositories;

use App\Models\Tag;

class TagHandleRepository
{
	/**
	 * Убирает пробелы по краям, преобразует все слова в нижний регистр с первой заглавной буквой.
	 */
	public function changeLetterCaseWithTrim(array $array)
	{
		$processedArray = [];

		foreach ($array as $key => $value) {
			$processedArray[$key] = mb_convert_case(mb_strtolower(trim($value)), MB_CASE_TITLE, "UTF-8");
		}

		return $processedArray;
	}

	/**
	 * Добавляет теги в БД, при условии что такого тега нет в БД
	 */
	public function insertTagIntoDB(array $tags)
	{

		foreach ($tags as $key => $value) {
			if (!Tag::where('name', $value)->first() && $value !== '') {
				Tag::create([
					'name' => $value
				]);
			}
		}
	}

	/**
	 * Возвращает массив с id тегов
	 */
	public function retrieveTagsIds(array $tags)
	{
		$tagsIds = [];

		foreach ($tags as $key => $value) {
			if ($value) {
				$tagsIds[$key] = Tag::where('name', $value)->first()->id;
			}
		}

		return $tagsIds;
	}

	public function handle(array $tags)
	{
		$processedTags = $this->changeLetterCaseWithTrim($tags);
		$this->insertTagIntoDB($processedTags);

		return $this->retrieveTagsIds($processedTags);
	}
}
