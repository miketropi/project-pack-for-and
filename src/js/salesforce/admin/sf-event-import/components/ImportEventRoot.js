import { useSFEventContext } from "../libs/context"

export default function ImportEventRoot() {
  const { Junctions, JunctionsSize } = useSFEventContext();

  return <div>
    Hello this is a test! { JunctionsSize }
    <br />
    { JSON.stringify(Junctions) }
  </div>
}