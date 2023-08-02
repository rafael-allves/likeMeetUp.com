export default function timeElapsed(publication)
{
   const minutes = Math.round((new Date().getTime() - new Date(publication.created_at).getTime()) / (1000 * 60));
   
   if(minutes < 60)return `${minutes} min`;
   const hours = Math.round(minutes / 60);
   
   if(hours == 1)return `${hours} hora`
   if(hours < 24)return `${hours} horas`;
   const days = Math.round(hours / 24);

   if(days == 1)return `${days} dia`
   if(days < 7) return `${days} dias`;
   const weeks = Math.round(days / 7);

   if(weeks == 1)return `${weeks} semana`
   if(weeks < 4)return `${weeks} semanas`;
   const mounths = Math.round(days / 30);
   
   if(mounths == 1)return `${mounths} mês`
   if(mounths < 12)return `${mounths} meses`;
   const years = Math.round(mounths / 12);

   return `${years} anos`
}