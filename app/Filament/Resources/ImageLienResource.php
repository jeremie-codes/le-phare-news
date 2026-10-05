<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageLienResource\Pages;
use App\Models\ImageLien;
use Filament\Forms;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Override;

class ImageLienResource extends Resource
{
    protected static ?string $model = ImageLien::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Image')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->directory('images-liens')
                            ->visibility('public')
                            ->required(),
                        Forms\Components\TextInput::make('url')
                            ->label('URL générée')
                            ->disabled()
                            ->url()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->limit(60)
                    ->tooltip(fn (?string $state): ?string => $state),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créée le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function canAccess(): bool
    {
        return Auth::user()->email === 'max@gmail.com';
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImageLiens::route('/'),
            'create' => Pages\CreateImageLien::route('/create'),
            'edit' => Pages\EditImageLien::route('/{record}/edit'),
        ];
    }

    public static function getImageUrl(?string $imagePath): ?string
    {
        return $imagePath
            ? rtrim((string) config('filesystems.disks.public.url'), '/') . '/' . ltrim($imagePath, '/')
            : null;
    }
}
