<?php

declare(strict_types=1);

namespace App\Enums;

enum GameGenre: string
{
    case baj = 'baj';
    case bl5 = 'bl5';
    case blank = 'blank';
    case bsg = 'bsg';
    case crd = 'crd';
    case dnd = 'dnd';
    case ds9 = 'ds9';
    case dsv = 'dsv';
    case ent = 'ent';
    case kli = 'kli';
    case mov = 'mov';
    case rom = 'rom';
    case sg1 = 'sg1';
    case sga = 'sga';
    case sto = 'sto';
    case tos = 'tos';

    public function displayName(): string
    {
        return match ($this) {
            self::baj => 'Star Trek: Bajoran',
            self::bl5 => 'Babylon 5',
            self::blank => 'Blank',
            self::bsg => 'Battlestar Galactica',
            self::crd => 'Star Trek: Cardassian',
            self::dnd => 'Dungeons and Dragons',
            self::ds9 => 'Star Trek: DS9 era',
            self::dsv => 'seaQuest DSV',
            self::ent => 'Star Trek: Enterprise era',
            self::kli => 'Star Trek: Klingon',
            self::mov => 'Star Trek: Movie era',
            self::rom => 'Star Trek: Romulan',
            self::sg1 => 'Stargate SG-1',
            self::sga => 'Stargate Atlantis',
            self::sto => 'Star Trek Online',
            self::tos => 'Star Trek: TOS era',
            default => 'Unknown',
        };
    }
}
